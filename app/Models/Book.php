<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'nombre_page',
        'date_pub',
        'image',
        'category_id',
        'author_id',
        'image_one',
        'image_two',
        'image_three',
        'image_four'
    ];
    public function author(){
        return $this->belongsTo(author::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function genre(){
        return $this->belongsToMany(Genre::class);
    }
    public function imageUrl(){
        return Storage::disk('public')->url($this->image);
    }
}
