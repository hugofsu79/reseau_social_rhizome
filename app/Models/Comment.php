<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    // champs que l'on peut insérer
    protected $fillable = [
        'content', 'image', 'tags', 'user_id', 'post_id'
    ];

    // nom de la fonction au singulier car 1 seul message en repation
    //cardinalité 1,1
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //idem

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
