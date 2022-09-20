<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public const DRAFT = "DRAFT";
    public const ACTIVE = "ACTIVE";
    public const BLOCKED = "BLOCKED";

    protected $table = 'news';
    public static $selectedFields = ['id', 'title', 'description', 'created_at', 'author', 'status'];

    protected $fillable = ['category_id', 'title', 'slug', 'author', 'status', 'image', 'description'];

    public function scopeStatus(Builder $query): Builder
    {
        return $query->where('status', News::ACTIVE)
            ->orWhere('status', News::DRAFT);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
