<?php

namespace App\Repository;

use App\Entity\Planing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Planing>
 *
 * @method Planing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Planing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Planing[]    findAll()
 * @method Planing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Planing::class);
    }

//    /**
//     * @return Planing[] Returns an array of Planing objects
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

//    public function findOneBySomeField($value): ?Planing
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
