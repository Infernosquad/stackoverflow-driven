<?php

namespace AppBundle\Filter;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class UserFilter extends SQLFilter
{

    /**
     * {@inheritdoc}
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if (!$this->getParameter('username')) {
            return '';
        }

        $sprintf =  sprintf("%s.name LIKE '%%%s%%'", $targetTableAlias, stripslashes(substr($this->getParameter('username'), 1, -1)));


        return $sprintf;
    }
}