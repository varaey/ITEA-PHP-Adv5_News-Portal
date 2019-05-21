<?php


namespace App\Service\PostsList;


use App\Mapper\PostMapper;
use App\Repository\PostsList\PostsListRepositoryInterface;

class PostsListPresentationService implements PostsListInterface
{
        private $postRepository;

        public function __construct(PostsListRepositoryInterface $postRepository)
        {
            $this->postRepository = $postRepository;
        }

    public function getByCategory(string $slug) : ?array
    {
                $entities = $this->postRepository->findByCategory($slug);

                if (null === $entities) {
                    return null;
                }

                $models = [];
                foreach ($entities as $key => $entity) {
                    $models= PostMapper::entityToModel($entity);
                    dd($models);
                }

                return $models;
    }
}