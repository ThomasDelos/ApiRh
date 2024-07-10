<?php

namespace App\Repository;

use App\Entity\TimeSheetStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TimeSheetStatus>
 *
 * @method TimeSheetStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimeSheetStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimeSheetStatus[]    findAll()
 * @method TimeSheetStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimeSheetStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimeSheetStatus::class);
    }

//    /**
//     * @return TimeSheetStatus[] Returns an array of TimeSheetStatus objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TimeSheetStatus
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
