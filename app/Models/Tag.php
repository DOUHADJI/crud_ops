<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom' , 'slug',
    ];

    protected $table = "tags";

    public function posts() {

        return $this -> belongsToMany(Post::class, 'post_tag');
    }

}
