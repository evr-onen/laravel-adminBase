<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CustomField extends Model
{
    use  HasTranslations;

    public $translatable = ['data'];

    protected $fillable = [
        'name',
        'section',
        'data',
    ];
}
