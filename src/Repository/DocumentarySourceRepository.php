<?php

namespace App\Repository;

use App\Entity\DocumentarySource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentarySource|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentarySource|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentarySource[]    findAll()
 * @method DocumentarySource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentarySourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentarySource::class);
    }

    // /**
    //  * @return DocumentarySource[] Returns an array of DocumentarySource objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentarySource
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
