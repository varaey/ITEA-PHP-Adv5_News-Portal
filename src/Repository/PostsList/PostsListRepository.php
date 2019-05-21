<?php

namespace App\Repository\PostsList;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostsListRepository extends ServiceEntityRepository implements PostsListRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findByCategory(string $slug) : ?array
    {
        try {
            return $this->createQueryBuilder('p')
                ->andWhere('p.publicationDate IS NOT NULL')
                ->innerJoin('p.category', 'c')
                ->addSelect('c')
                ->where('c.slug = :slug')
                ->setParameter('slug', $slug)
                ->getQuery()
                ->getArrayResult()
            ;
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }
}
