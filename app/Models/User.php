<?php

namespace App\Models;

use App\Repositories\UserRepository;
use Imhotep\Auth\Traits\Authenticatable;
use Imhotep\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * @property int id
 * @property string login
 * @property string password
 * @property string createdAt
 * @property string updatedAt
 * @property string deletedAt
 */
class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected static string $repository = UserRepository::class;

    public static function create(string $login, string $password): static
    {
        $user = new static([
            'login' => $login,
            'password' => hash('sha256', $password),
        ]);

        $user->save();

        return static::get($user->id);
    }
}