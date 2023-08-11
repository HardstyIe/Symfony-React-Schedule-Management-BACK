<?php

namespace App\Repository;

use App\Entity\NotificationClasse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NotificationClasse>
 *
 * @method NotificationClasse|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotificationClasse|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotificationClasse[]    findAll()
 * @method NotificationClasse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotificationClasseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotificationClasse::class);
    }

//    /**
//     * @return NotificationClasse[] Returns an array of NotificationClasse objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NotificationClasse
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
