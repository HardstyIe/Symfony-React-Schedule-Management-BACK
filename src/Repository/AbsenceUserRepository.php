<?php

namespace App\Repository;

use App\Entity\AbsenceUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AbsenceUser>
 *
 * @method AbsenceUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbsenceUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbsenceUser[]    findAll()
 * @method AbsenceUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbsenceUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbsenceUser::class);
    }

//    /**
//     * @return AbsenceUser[] Returns an array of AbsenceUser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AbsenceUser
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
