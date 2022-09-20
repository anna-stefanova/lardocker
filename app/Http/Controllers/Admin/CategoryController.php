<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           'title' => ['required', 'string', 'min: 5', 'max: 155']
        ]);

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
            $request->only(['title', 'description'])
        );

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно добавлена');
        }


        return back()->with('error', 'Не удалось добавить запись');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->input('title');
        $category->description = $request->input('description');

        if ($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить категорию');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
