<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 16/11/2018
 * Time: 10:59
 */
namespace App\Base;
use App\Base\Repository;
abstract class Criteria
{
    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    abstract public function apply($model, Repository $repository);
}
