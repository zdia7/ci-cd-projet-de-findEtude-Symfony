<?php

namespace App\Repository;

use App\Entity\Vr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vr[]    findAll()
 * @method Vr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VrRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vr::class);
    }

    // /**
    //  * @return Vr[] Returns an array of Vr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vr
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
