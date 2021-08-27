<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
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
        $categories = Category::paginate(10);
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
        return view('admin.categories.create', compact('category', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
//        $rules = [
//            'name' => 'required|string|max:255|min:2|unique:categories,id',
//            'parent_id' => 'nullable|int|exists:categories,id',
//            'description' => 'nullable|min:5',
//            'status' => 'required|in:active,draft',
//            'image_path' => 'nullable|image|min_width=300'
//        ];
//
//
//        $this->validate($request, $rules);


        $slug = Str::slug($request->post('name'));
        $request->merge([
            'slug' => $slug
        ]);
        if ($request->hasFile('image_path')) {

            $file = $request->file('image_path');
            $path = $file->store('/',
                [
                    'disk' => 'uploads'
                ]);
            $request->merge([
                'image_path' => $path
            ]);
        }
        $request->except('_token');

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
    public function update(CategoryRequest $request, $id)
    {
//        $rules = [
//            'name' => 'required|string|max:255|min:2|unique:categories,id',
//            'parent_id' => 'nullable|int|exists:categories,id',
//            'description' => 'nullable|min:5',
//            'status' => 'required|in:active,draft',
//            'image_path' => 'nullable|image|min_width=300'
//        ];
//
//        $message = [
//            'name.required' => 'اسم التصنيف مطلوب',
//            'parent_id.exists' => 'تصنفي يجب ان يكون موجود مسبقا ',
//            'status.required' => 'الحالة مطلوبة'
//        ];
//        $this->validate($request, $rules, $message);

        $data = request()->except(['_token', '_method']);

//        Category::where('id', $id)->update($request->all());
        Category::where('id', '=', $id)->update($data);

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
            ->with('success', 'Category Deleted!');
    }

    public function forceDelete($id = null)
    {


    }
}
