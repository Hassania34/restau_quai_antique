<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Utilisateur>
 *
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

    public function save(Utilisateur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Utilisateur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return Utilisateur[] Returns an array of Utilisateur objects
    */
   public function getUtilisateurLogin(string $mail,string $password): array
   {
    $conn = $this->getEntityManager()->getConnection();

    $sql = '
        SELECT * 
        FROM utilisateur u
        WHERE 
        p.mail = :mail
        and
        p.password = :password
        ';
    $stmt = $conn->prepare($sql);
    $resultSet = $stmt->executeQuery(['mail' => $mail,'password' => $password]);

    // returns an array of arrays (i.e. a raw data set)
    return $resultSet->fetchAllAssociative();
   }
}

