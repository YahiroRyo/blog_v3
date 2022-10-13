<?php

namespace Packages\Infrastructure\Eloquent\Blog;

use Illuminate\Database\Eloquent\Model;

class ActiveBlog extends Model {
    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = null;

    public $incrementing  = false;
    protected $table      = 'activeBlogs';
    protected $keyType    = 'string';
    protected $primaryKey = 'blogId';
    protected $fillable   = [
        'blogId',
    ];
}
