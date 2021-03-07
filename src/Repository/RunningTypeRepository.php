<?php

namespace App\Repository;

use App\Entity\RunningType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RunningType|null find($id, $lockMode = null, $lockVersion = null)
 * @method RunningType|null findOneBy(array $criteria, array $orderBy = null)
 * @method RunningType[]    findAll()
 * @method RunningType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RunningTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RunningType::class);
    }

    // /**
    //  * @return RunningType[] Returns an array of RunningType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RunningType
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
