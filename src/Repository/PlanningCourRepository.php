<?php

namespace App\Repository;

use App\Entity\PlanningCour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlanningCour>
 *
 * @method PlanningCour|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanningCour|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanningCour[]    findAll()
 * @method PlanningCour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanningCourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanningCour::class);
    }

//    /**
//     * @return PlanningCour[] Returns an array of PlanningCour objects
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

//    public function findOneBySomeField($value): ?PlanningCour
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
