<?php

namespace App\Repository;

use App\Entity\PlanningClasse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlanningClasse>
 *
 * @method PlanningClasse|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanningClasse|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanningClasse[]    findAll()
 * @method PlanningClasse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanningClasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanningClasse::class);
    }

//    /**
//     * @return PlanningClasse[] Returns an array of PlanningClasse objects
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

//    public function findOneBySomeField($value): ?PlanningClasse
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
