<?php

namespace App\Repository;

use App\Entity\LatinExpression;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LatinExpression|null find($id, $lockMode = null, $lockVersion = null)
 * @method LatinExpression|null findOneBy(array $criteria, array $orderBy = null)
 * @method LatinExpression[]    findAll()
 * @method LatinExpression[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LatinExpressionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LatinExpression::class);
    }

    // /**
    //  * @return LatinExpression[] Returns an array of LatinExpression objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LatinExpression
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
