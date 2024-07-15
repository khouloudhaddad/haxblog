<?php

use Domain\Blog\Entities\Post;
use Domain\Blog\Test\Adapters\InMemoryPostRepository;
use Domain\Blog\UseCases\CreatePost;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it("should create a post", function () {
    $repository = new InMemoryPostRepository;

    $useCase = new CreatePost($repository);

    $post = $useCase->execute([
        'title' => 'My title',
        'content' => 'My content',
        'publishedAt' => new DateTime()
    ]);

    assertInstanceOf(Post::class, $post);
    assertEquals($post, $repository->findOne($post->uuid));
});
