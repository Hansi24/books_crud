<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'price',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }

}
