<?php

namespace Domain\Blog\Test\Adapters;

use Domain\Blog\Entities\Post;

class InMemoryPostRepository
{
    public array $posts = [];

    public function save(Post $post): Post
    {
        $this->posts[$post->uuid] = $post;

        return $post;
    }

    public function findOne(string $uuid) : ?Post{
        return $this->posts[$uuid] ?? null;
    }
}