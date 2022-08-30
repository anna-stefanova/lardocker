<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $categories = [
        [
            'id' => 1,
            'title' => 'Политика',
            'description' => 'Все политические новости'
        ],
        [
            'id' => 2,
            'title' => 'Экономика',
            'description' => 'Все экономические новости'
        ],
        [
            'id' => 3,
            'title' => 'Наука',
            'description' => 'Все научные новости'
        ],
        [
            'id' => 4,
            'title' => 'Культура',
            'description' => 'Все новости культуры'
        ],
        [
            'id' => 5,
            'title' => 'Религия',
            'description' => 'Все религиозные новости'
        ],
        [
            'id' => 6,
            'title' => 'Туризма',
            'description' => 'Все новости туризма'
        ]
    ];




    public function getNews(int $id = null): array
    {
        $news = [];
        $faker = Factory::create();

        if ($id) {
            return [
                'id'          => $id,
                'title'       => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'status'      => 'DRAFT',
                'description' => $faker->text(100),
                'category_id' => rand(1, 6),
                'created_at'  => now('Europe/Moscow'),
            ];
        }

        for ($i = 1; $i < 21; $i++) {
            $news[$i] = [
                'id'          => $i,
                'title'       => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'status'      => 'DRAFT',
                'description' => $faker->text(100),
                'category_id' => rand(1, count($this->categories)),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $news;
    }

}
