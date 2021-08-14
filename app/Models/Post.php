<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' , 'slug', 'content'
    ];

    public function Tags(){

            return  $this -> belongsToMany(Tag::class, 'post_tag');
    }

}