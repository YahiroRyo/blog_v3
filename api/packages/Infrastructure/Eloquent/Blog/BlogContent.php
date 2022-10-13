<?php

namespace Packages\Infrastructure\Eloquent\Blog;

use Database\Factories\Blog\BlogContentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogContent extends Model {
    use HasFactory;

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = null;

    public $incrementing  = false;
    protected $table      = 'blogContents';
    protected $keyType    = 'string';
    protected $primaryKey = 'blogId';
    protected $fillable   = [
        'blogId',
        'title',
        'body',
        'thumbnail',
    ];

    protected static function newFactory(): BlogContentFactory {
        return new BlogContentFactory();
    }
}
