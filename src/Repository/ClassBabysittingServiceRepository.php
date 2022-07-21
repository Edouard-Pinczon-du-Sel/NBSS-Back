<?php

namespace App\Repository;

use App\Entity\ClassBabysittingService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClassBabysittingService>
 *
 * @method ClassBabysittingService|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassBabysittingService|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassBabysittingService[]    findAll()
 * @method ClassBabysittingService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassBabysittingServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassBabysittingService::class);
    }

    public function add(ClassBabysittingService $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ClassBabysittingService $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ClassBabysittingService[] Returns an array of ClassBabysittingService objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClassBabysittingService
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
