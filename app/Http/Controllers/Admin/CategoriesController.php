<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categories = Category::paginate(10);
        $categories = Category::all();
        return view('admin.categories.index',
            [
                'categories' => $categories
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parents = Category::all();
        $category = new Category();
        return view('admin.categories.create', compact('category','parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->post('name'));
        $request->merge([
            'slug' => $slug
        ]);
        $category = Category::create($request->all());
//        $category = Category::create([
//            'name' => $request->post('name'),
//            'parent_id' => $request->post('parent_id'),
//            'description' => $request->input('description'),
//            'slug' => $slug,
//            'status' => $request->input('status') ? $request->input('status') : 'Active'
//        ]);

        return redirect()->route('categories.index');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        $parents = Category::where('id', '<>', $id)->get();

        return view('admin.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        Category::where('id', $id)->update($request->all());
        Category::where('id', '=', $id)->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Category::where('id', '=', $id)->delete();
        Category::destroy($id);
        return redirect()->route('categories.index')
            ->with('success','Category Deleted!');
    }
}
