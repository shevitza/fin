<?php

namespace App\Repository;

use App\Entity\Finval;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;

/**
 * @method Finval|null find($id, $lockMode = null, $lockVersion = null)
 * @method Finval|null findOneBy(array $criteria, array $orderBy = null)
 * @method Finval[]    findAll()
 * @method Finval[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinvalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Finval::class);
    }
    
    
 public function findByCompany(int $indicatorID, int $companyID): array {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
                'SELECT  f.reportedDate, f.finValue FROM App\Entity\Finval f '
                . 'WHERE f.indicatorID=:indicatorID '
                . 'AND f.companyID=:companyID '
                . 'ORDER BY f.reportedDate DESC'
        );

        $query->setParameters(new ArrayCollection([
                    new Parameter(':indicatorID', $indicatorID),
                    new Parameter(':companyID', $companyID)
        ]));

        return $query->getResult();
    }
    // /**
    //  * @return Finval[] Returns an array of Finval objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Finval
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
