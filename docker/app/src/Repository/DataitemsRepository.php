<?php

namespace App\Repository;

use App\Entity\Dataitems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dataitems|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dataitems|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dataitems[]    findAll()
 * @method Dataitems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataitemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dataitems::class);
    }

    // /**
    //  * @return Dataitems[] Returns an array of Dataitems objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dataitems
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
