<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


class NewsController extends Controller
{

    public function index(): Application|Factory|View
    {
        // list all new
        return view('news.index', [
            'categories' => Category::query()->get(),
            'newsList' => News::query()->with('category')->get()
        ]);
    }

    public function show(int $id): Factory|View|Application
    {
        // return current news
        return view('news.show', [
            'news' => News::query()->findOrFail($id),
        ]);
    }
}
