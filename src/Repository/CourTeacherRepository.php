<?php

namespace App\Repository;

use App\Entity\CourTeacher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CourTeacher>
 *
 * @method CourTeacher|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourTeacher|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourTeacher[]    findAll()
 * @method CourTeacher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourTeacherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourTeacher::class);
    }

//    /**
//     * @return CourTeacher[] Returns an array of CourTeacher objects
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

//    public function findOneBySomeField($value): ?CourTeacher
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
