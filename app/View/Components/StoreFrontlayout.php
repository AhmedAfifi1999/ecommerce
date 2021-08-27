<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class StoreFrontlayout extends Component
{

    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.store-front', [
            'title' => $this->title

        ]);
    }
}
