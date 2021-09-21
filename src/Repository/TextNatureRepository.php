<?php

namespace App\Repository;

use App\Entity\TextNature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TextNature|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextNature|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextNature[]    findAll()
 * @method TextNature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextNatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextNature::class);
    }

    // /**
    //  * @return TextNature[] Returns an array of TextNature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TextNature
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
