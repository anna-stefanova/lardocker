<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public const DRAFT = "DRAFT";
    public const ACTIVE = "ACTIVE";
    public const BLOCKED = "BLOCKED";

    public function getNews()
    {
        dd('getNews');
    }

    public function getNewsById(int $id)
    {
        dd('getNewsById');
    }
}
