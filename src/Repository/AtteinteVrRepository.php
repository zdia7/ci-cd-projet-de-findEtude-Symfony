<?php

namespace App\Repository;

use App\Entity\AtteinteVr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AtteinteVr|null find($id, $lockMode = null, $lockVersion = null)
 * @method AtteinteVr|null findOneBy(array $criteria, array $orderBy = null)
 * @method AtteinteVr[]    findAll()
 * @method AtteinteVr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtteinteVrRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AtteinteVr::class);
    }

    // /**
    //  * @return AtteinteVr[] Returns an array of AtteinteVr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AtteinteVr
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
