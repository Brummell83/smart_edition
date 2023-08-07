<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_author',
        'biographie'
    ];

    public function book(){
        return $this->hasMany(Book::class);
    }
}
