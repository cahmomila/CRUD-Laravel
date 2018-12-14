<?php
/**
 * Created by PhpStorm.
 * User: lets
 * Date: 14/12/2018
 * Time: 10:25
 */
namespace App\Repositories\Criterias;

use App\Base\Criteria;
use App\Base\Repository;

class Where extends Criteria
{
    private $values;
    private $operator;
    private $field;

    public function __construct($field, $operator, $values = null)
    {
        $this->values = $values;

        $this->operator = $operator;

        $this->field = $field;
    }

    public function apply($queryBuilder, Repository $repository)
    {

        return ($this->values) ?
            $queryBuilder->where($this->field, $this->operator, $this->values) :
            $queryBuilder->where($this->field, $this->operator);
    }
}
