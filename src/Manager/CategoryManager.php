<?php
/**
 * Created by cudev.loc.
 * @author: Dmitriy Shuba <sda@sda.in.ua>
 * @link: http://maxi-soft.net/ Maxi-Soft
 * Date Time: 12.04.2018 0:54
 */

namespace App\Manager;


class CategoryManager extends BaseManager
{
    public function getCategoriesByLocale(string $localeId)
    {
        return $this->getEntityManager()->getRepository("App:Category")->getCategoriesByLocale($localeId);
    }
}