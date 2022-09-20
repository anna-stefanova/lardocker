<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $builder
     * @return Application|Factory|View
     */
    public function index(NewsQueryBuilder $builder): View|Factory|Application
    {

        return view('admin.news.index', [
            'newsList' => $builder->getNews()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::query()->get();
        return view('admin.news.create', [
           'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(Request $request, NewsQueryBuilder $builder): RedirectResponse
    {
        $news = $builder->create(
            \request()->only('title', 'author', 'description', 'category_id', 'image', 'status')
        );

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
        $categories = Category::query()->get();
        return view('admin.news.edit', [
            'categories' => $categories,
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(Request $request, News $news, NewsQueryBuilder $builder): RedirectResponse
    {
        if($builder->update($news, \request()->only('title', 'author', 'description', 'category_id', 'image', 'status'))) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse|string
    {
        return '1';
        /*return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно удалена');*/

    }
}
