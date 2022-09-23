<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('admin.categories.index', [
            'categories' => Category::query()->paginate(config('pagination.admin.category')),
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
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {

        /*$data = $request->only('title', 'description');*/
        /* 3) Еще один способ добавления данных в базу данных через метод create() и передавать в него какие-то данные */
        /*return Category::create($data);*/

        /* 1) Сохранение данных, обращаясь напрямую к модели News или Category и ее свойствам - удобно, когда полей мало */
        /*$news = new News();
        $news->title = $data['title'];
        $news->description = $data['description'];*/

        /* или */

        /*$news->title = $request->input('title');
        $news->description = $request->input('description');*/

        /* 2) Массовое сохранение - мы сразу передаем свойства в конструктор модели */

        $category = new Category(
            $request->validated()
        );

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.category.create.success'));
        }


        return back()->with('error', __('messages.admin.category.create.fail'));
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
     * @param  Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category): View|Factory|Application
    {
        //
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Category $category): RedirectResponse
    {
        $category->fill($request->validated());

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.category.edit.success'));
        }

        return back()->with('error', __('messages.admin.category.edit.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
