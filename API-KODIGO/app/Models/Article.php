<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Likeable;
use App\Models\Concerns\Likes;
class Post extends Model implements Likeable
{
    use Likes;
}
class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'price',
        'stock',
        'visibility'
    ];
}

