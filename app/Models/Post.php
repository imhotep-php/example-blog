<?php

namespace App\Models;

use App\Repositories\PostRepository;
use Imhotep\Support\Str;

/**
 * @property int id
 * @property string userId
 * @property string slug
 * @property string title
 * @property string text
 * @property string createdAt
 * @property string updatedAt
 * @property string deletedAt
 */
class Post extends Model
{
    protected static string $repository = PostRepository::class;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (isset($this->attributes['id'])) {
            $this->attributes['id'] = (int)$this->attributes['id'];
        }
    }

    public static function create(string $title, string $text): ?Post
    {
        $post = new static([
            'user_id' => auth()->id(),
            'slug' => Str::slug($title),
            'title' => $title,
            'text' => $text
        ]);

        $post->save();

        return static::get($post->id);
    }

    public function description(): string
    {
        if (Str::length($this->attributes['text']) > 100) {
           return Str::substr($this->attributes['text'], 0, 100).'...';
        }

        return $this->attributes['text'];
    }

    public function text(): string
    {
        return str_replace("\n", '<br>', $this->text);
    }

    public function __set(string $name, $value)
    {
        if ($name === 'title') {
            $this->changedAttributes['slug'] = Str::slug($value);
        }

        parent::__set($name, $value);
    }
}