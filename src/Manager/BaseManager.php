<?php
/**
 * Created by cudev.loc.
 * @author: Dmitriy Shuba <sda@sda.in.ua>
 * @link: http://maxi-soft.net/ Maxi-Soft
 * Date Time: 12.04.2018 0:54
 */

namespace App\Manager;


use Doctrine\ORM\EntityManager;

abstract class BaseManager
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     * @return BaseManager
     */
    public function setEntityManager(EntityManager $entityManager): BaseManager
    {
        $this->entityManager = $entityManager;
        return $this;
    }

}