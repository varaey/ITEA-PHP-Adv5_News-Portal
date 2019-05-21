<?php


namespace App\Service\PostsList;


interface PostsListInterface
{
    public function getByCategory(string $slug): ?array;
}