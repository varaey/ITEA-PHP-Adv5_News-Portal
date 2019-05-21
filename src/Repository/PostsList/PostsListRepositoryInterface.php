<?php

namespace App\Repository\PostsList;

interface PostsListRepositoryInterface
{
    public function findByCategory(string $slug): ?array;
}
