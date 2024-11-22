<?php

namespace App\Repositories;

use App\Models\User;
use Imhotep\Facades\DB;

class UserRepository extends Repository
{
    protected static string $table = 'users';

    protected static string $model = User::class;

    protected static bool $softDelete = false;

    public static function hasByLogin(string $login): bool
    {
        return DB::table(static::$table)->where('login', $login)->count() > 0;
    }

    public static function getByLogin(string $login): ?User
    {
        return static::format(
            DB::table(static::$table)
                ->where('login', $login)
                ->get()
        );
    }
}