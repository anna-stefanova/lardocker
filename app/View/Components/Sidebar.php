<?php

namespace App\View\Components;

use App\Http\Controllers\Controller;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public array $categories;
    public array $newsList;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $content = new Controller();

        $this->newsList = $content->getNews();
        $this->categories = $content->getCategories();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar', [
            'categories' => $this->categories,
            'newsList' => $this->newsList,
        ]);
    }
}
