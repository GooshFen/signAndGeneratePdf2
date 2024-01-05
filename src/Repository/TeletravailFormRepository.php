<?php

namespace App\Repository;

use App\Entity\TeletravailForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TeletravailForm>
 *
 * @method TeletravailForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeletravailForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeletravailForm[]    findAll()
 * @method TeletravailForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeletravailFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeletravailForm::class);
    }

//    /**
//     * @return TeletravailForm[] Returns an array of TeletravailForm objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TeletravailForm
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
