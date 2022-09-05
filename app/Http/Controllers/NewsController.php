<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news;


    /**
     * @param $news
     */
    public function __construct()
    {
        $this->news = $this->getNews();
    }


    public function index()
    {

        $news = $this->getNews();
        $categories = $this->categories;
        // list all news
        return view('news.index', [
            'categories' => $categories,
            'newsList' => $news,
        ]);
    }

    public function show(int $id)
    {

        $categories = $this->categories;
        $news = $this->getNews($id);
        // return current news
        return view('news.show', [
            'categories' => $categories,
            'news' => $news,
        ]);
    }







}
