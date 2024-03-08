<?php

namespace App\Repository;

use App\Entity\Jobcategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Jobcategory>
 *
 * @method Jobcategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jobcategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jobcategory[]    findAll()
 * @method Jobcategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobcategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jobcategory::class);
    }

    //    /**
    //     * @return Jobcategory[] Returns an array of Jobcategory objects
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

    //    public function findOneBySomeField($value): ?Jobcategory
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
