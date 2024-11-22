<?php

namespace App\Repositories;

use App\Models\Post;
use Imhotep\Facades\DB;

class PostRepository extends Repository
{
    protected static string $table = 'blogs';

    protected static string $model = Post::class;

    protected static bool $softDelete = true;

    public static function all(): array
    {
        $user_ids = [0];
        if ($id = auth()->id()) $user_ids[] = $id;

        return static::format(DB::table(static::$table)
            ->whereIn('user_id', $user_ids)
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'desc')
            ->get());
    }

    public static function getBySlug(string $slug): ?object
    {
        return static::format(DB::table(static::$table)
            ->whereNull('deleted_at')
            ->where('slug', $slug)
            ->first());
    }

    public static function getByQuery(string $query): array
    {
        $user_ids = [0];
        if ($id = auth()->id()) $user_ids[] = $id;

        return static::format(DB::table(static::$table)
            ->where('title', 'like', "%{$query}%")
            ->whereIn('user_id', $user_ids)
            ->whereNull('deleted_at')
            ->orderBy('updated_at', 'desc')
            ->get());
    }
}