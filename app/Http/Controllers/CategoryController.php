<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show(int $id)
    {


        return view('categories.show', [
            'category' => Category::find($id),
            'newsList' => News::query()->where('category_id', '=', $id)->get()
        ]);
    }


}
