<?php

namespace Domain\Blog\Port;

use Domain\Blog\Entities\Post;

interface PostRepositoryInterface
{
    public function save(Post $post);
    public function findOne(string $uuid) : ?Post; 
}