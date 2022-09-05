<?php

namespace App\View\Components;

use App\Http\Controllers\Controller;
use Illuminate\View\Component;

class Header extends Component
{

    public array $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $content = new Controller();
        $this->categories = $content->getCategories();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header', [
            'categories' => $this->categories,
        ]);
    }
}
