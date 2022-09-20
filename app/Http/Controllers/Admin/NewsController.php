<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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
     * @return Response
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
     * @param CreateRequest $request
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(CreateRequest $request, NewsQueryBuilder $builder): RedirectResponse
    {
        $news = $builder->create(
            $request->validated()
        );

        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back('error', __('messages.admin.news.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(News $news): Application|Factory|View
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
                ->with('success', __('messages.admin.news.edit.success'));
        }
        return back()->with('error', __('messages.admin.news.edit.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $deleted = $news->delete();
            if ($deleted === false) {
                return \response()->json(['status' => 'error'], 400);
            }

            return \response()->json(['ok']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return \response()->json(['status' => 'error'], 400);
        }
    }
}
