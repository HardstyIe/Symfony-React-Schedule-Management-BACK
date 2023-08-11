<?php

namespace App\Repository;

use App\Entity\CourClasse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CourClasse>
 *
 * @method CourClasse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourClasse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourClasse[]    findAll()
 * @method CourClasse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourClasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourClasse::class);
    }

//    /**
//     * @return CourClasse[] Returns an array of CourClasse objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CourClasse
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
