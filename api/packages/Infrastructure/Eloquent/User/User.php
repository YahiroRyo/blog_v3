<?php

namespace Packages\Infrastructure\Eloquent\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = null;
    protected $primaryKey   = 'userId';
    protected $fillable     = [
        'email',
        'password',
    ];
}
