<?php

namespace Packages\Infrastructure\Eloquent\Blog;

use Illuminate\Database\Eloquent\Model;

class NonActiveBlog extends Model {
    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = null;

    public $incrementing  = false;
    protected $table      = 'nonActiveBlogs';
    protected $keyType    = 'string';
    protected $primaryKey = 'blogId';
    protected $fillable   = [
        'blogId',
    ];
}
