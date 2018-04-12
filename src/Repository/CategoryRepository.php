<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getCategoriesByLocale(string $localeId)
    {
        $rsm = new ResultSetMapping();
        $sql = 'SELECT `id`, IFNULL(`parent_id`, "#") AS parent, `name` FROM `categories` WHERE `locale_id` = :localeId';
        $q = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        $q->setParameter('localeId', $localeId);

        $rsm
            ->addScalarResult('id', 'id')
            ->addScalarResult('parent', 'parent')
            ->addScalarResult('name', 'text')
            ->addScalarResult('locale_id', 'locale_id')
        ;

        return $q->getResult(Query::HYDRATE_ARRAY);
    }
}
