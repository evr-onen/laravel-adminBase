<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', "img_path", "content"];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'cats_blogs_pivots', 'blog_id', 'category_id');
    }
}
