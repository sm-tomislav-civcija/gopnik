<?php

namespace App\Repository;

use App\Entity\GopnikVideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GopnikVideo|null find($id, $lockMode = null, $lockVersion = null)
 * @method GopnikVideo|null findOneBy(array $criteria, array $orderBy = null)
 * @method GopnikVideo[]    findAll()
 * @method GopnikVideo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GopnikVideoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GopnikVideo::class);
    }

//    /**
//     * @return GopnikVideo[] Returns an array of GopnikVideo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GopnikVideo
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
