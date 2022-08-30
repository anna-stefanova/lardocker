<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = $this->categories;
        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function show(int $id)
    {
        return view('categories.show', [
            'category' => $this->getCategory($id),
            'news' => $this->getNewsByCategory($id),
        ]);
    }

    private function getCategory(int $id)
    {
        $categories = $this->categories;
        foreach ($categories as $category) {
            if ($category['id'] === $id) {
                return $category;
            }
        }
    }

    private function getNewsByCategory(int $id): array
    {
        $newsByCategory = [];
        foreach ($this->getNews() as $news) {
            if ($news['category_id'] === $id) {
                $newsByCategory[] = $news;
            }
        };
        return $newsByCategory;
    }

}
