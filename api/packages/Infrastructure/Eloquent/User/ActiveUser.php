<?php

namespace Packages\Infrastructure\Eloquent\User;

use Illuminate\Database\Eloquent\Model;

class ActiveUser extends Model {
    protected $table      = 'activeUsers';
    protected $primaryKey = 'userId';
    protected $fillable   = [
        'userId',
    ];
}
