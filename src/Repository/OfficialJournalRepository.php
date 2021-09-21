<?php

namespace App\Repository;

use App\Entity\OfficialJournal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OfficialJournal|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfficialJournal|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfficialJournal[]    findAll()
 * @method OfficialJournal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfficialJournalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfficialJournal::class);
    }

    // /**
    //  * @return OfficialJournal[] Returns an array of OfficialJournal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OfficialJournal
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
