<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    private static $selectedFields = ['id', 'title', 'description', 'created_at'];
    public $timestamps = true;

    public function getCategories(): \Illuminate\Support\Collection
    {
        return DB::table($this->table)->get(self::$selectedFields);
    }

    public function getCategoryById(int $id)
    {
        return DB::table($this->table)->find($id, self::$selectedFields);
    }
}
