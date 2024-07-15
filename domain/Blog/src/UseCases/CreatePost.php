<?php

namespace Domain\Blog\UseCases;

use Domain\Blog\Entities\Post;
use Domain\Blog\Port\PostRepositoryInterface;

class CreatePost
{
    protected PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->postRepository = $repository;
    }

    public function execute(array $postData): ?Post
    {
        $post = new Post($postData['title'], $postData['content'], $postData['publishedAt']);

        $this->postRepository->save($post);

        return $post;
    }
}