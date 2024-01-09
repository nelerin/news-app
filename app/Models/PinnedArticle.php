<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinnedArticle extends Model
{
    use HasFactory;

    protected $table = 'pinned_article';
    protected $primaryKey = 'id';

    protected $fillable = [
       'article_id',
        'type',
        'section_id',
        'section_name',
        'publication_date',
        'title',
        'url',
        'api_url',
    ];
}
