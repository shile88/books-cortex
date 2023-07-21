<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }


    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function letter()
    {
        return $this->belongsTo(Letter::class);
    }

    public function binding()
    {
        return $this->belongsTo(Binding::class);
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
