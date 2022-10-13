<?php

namespace Packages\Infrastructure\Eloquent\User;

use Illuminate\Database\Eloquent\Model;

class ActiveUser extends Model {
    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = null;
    protected $table        = 'activeUsers';
    protected $primaryKey   = 'userId';
    protected $fillable     = [
        'userId',
    ];
}
