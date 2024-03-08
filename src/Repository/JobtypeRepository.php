<?php

namespace App\Repository;

use App\Entity\Jobtype;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Jobtype>
 *
 * @method Jobtype|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jobtype|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jobtype[]    findAll()
 * @method Jobtype[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobtypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jobtype::class);
    }

    //    /**
    //     * @return Jobtype[] Returns an array of Jobtype objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('j.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Jobtype
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
