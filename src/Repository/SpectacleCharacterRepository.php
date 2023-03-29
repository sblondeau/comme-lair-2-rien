<?php

namespace App\Repository;

use App\Entity\SpectacleCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SpectacleCharacter>
 *
 * @method SpectacleCharacter|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpectacleCharacter|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpectacleCharacter[]    findAll()
 * @method SpectacleCharacter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpectacleCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpectacleCharacter::class);
    }

    public function save(SpectacleCharacter $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SpectacleCharacter $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SpectacleCharacter[] Returns an array of SpectacleCharacter objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SpectacleCharacter
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
