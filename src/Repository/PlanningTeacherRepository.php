<?php

namespace App\Repository;

use App\Entity\PlanningTeacher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlanningTeacher>
 *
 * @method PlanningTeacher|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanningTeacher|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanningTeacher[]    findAll()
 * @method PlanningTeacher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanningTeacherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanningTeacher::class);
    }

//    /**
//     * @return PlanningTeacher[] Returns an array of PlanningTeacher objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlanningTeacher
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
