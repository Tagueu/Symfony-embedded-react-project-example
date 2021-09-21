<?php

namespace App\Repository;

use App\Entity\Jurisprudence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Jurisprudence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jurisprudence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jurisprudence[]    findAll()
 * @method Jurisprudence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JurisprudenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jurisprudence::class);
    }

    // /**
    //  * @return Jurisprudence[] Returns an array of Jurisprudence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jurisprudence
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
