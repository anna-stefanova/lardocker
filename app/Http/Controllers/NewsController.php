<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Collection;


class NewsController extends Controller
{

    protected array|Collection $categories;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::query()->get();
    }


    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // list all new

        return view('news.index', [
            'categories' => $this->categories,
            'newsList' => News::query()->paginate(config('pagination.news')),
        ]);
    }

    public function show(int $id)
    {
        // return current news

        return view('news.show', [
            'categories' => $this->categories,
            'news' => News::query()->find($id),
        ]);
    }
}
