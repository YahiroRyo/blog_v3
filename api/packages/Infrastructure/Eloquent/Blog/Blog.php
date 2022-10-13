<?php

namespace Packages\Infrastructure\Eloquent\Blog;

use Database\Factories\Blog\BlogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model {
    use HasFactory;

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = 'updatedAt';

    public $incrementing  = false;
    protected $table      = 'blogs';
    protected $keyType    = 'string';
    protected $primaryKey = 'blogId';
    protected $fillable   = [
        'blogId',
    ];

    public function content(): HasOne {
        return $this->hasOne(BlogContent::class, 'blogId', 'blogId');
    }

    protected static function newFactory(): BlogFactory {
        return new BlogFactory();
    }
}
