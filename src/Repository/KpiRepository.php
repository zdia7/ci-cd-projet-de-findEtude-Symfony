<?php

namespace App\Repository;

use App\Entity\Kpi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kpi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kpi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kpi[]    findAll()
 * @method Kpi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KpiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kpi::class);
    }

    // /**
    //  * @return Kpi[] Returns an array of Kpi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kpi
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
