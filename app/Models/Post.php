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

    protected $table = "posts";

    public function tags() {

            return  $this -> belongsToMany(Tag::class, 'post_tag');
    }

}
