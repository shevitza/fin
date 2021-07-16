<?php

namespace App\Repository;

use App\Entity\Indicator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Indicator|null find($id, $lockMode = null, $lockVersion = null)
 * @method Indicator|null findOneBy(array $criteria, array $orderBy = null)
 * @method Indicator[]    findAll()
 * @method Indicator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndicatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Indicator::class);
    }

    // /**
    //  * @return Indicator[] Returns an array of Indicator objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Indicator
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
