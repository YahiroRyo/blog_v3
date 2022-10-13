<?php

namespace Packages\Infrastructure\Eloquent\User;

use Illuminate\Database\Eloquent\Model;

class NonActiveUser extends Model {
    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = null;
    protected $table        = 'nonActiveUsers';
    protected $primaryKey   = 'userId';
    protected $fillable     = [
        'userId',
    ];
}
