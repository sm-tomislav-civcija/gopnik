<?php

namespace App\Repository;

use App\Entity\GopnikProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GopnikProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method GopnikProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method GopnikProduct[]    findAll()
 * @method GopnikProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GopnikProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GopnikProduct::class);
    }

//    /**
//     * @return GopnikProduct[] Returns an array of GopnikProduct objects
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
    public function findOneBySomeField($value): ?GopnikProduct
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
