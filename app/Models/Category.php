<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{

    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'cats_blogs_pivots', 'category_id', 'blog_id');
    }
}
