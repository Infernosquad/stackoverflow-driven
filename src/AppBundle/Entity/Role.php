<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;

class Role implements RoleInterface
{

    /**
     * Returns the role.
     *
     * This method returns a string representation whenever possible.
     *
     * When the role cannot be represented with sufficient precision by a
     * string, it should return null.
     *
     * @return string|null A string representation of the role, or null
     */
    public function getRole()
    {
        // TODO: Implement getRole() method.
    }
}