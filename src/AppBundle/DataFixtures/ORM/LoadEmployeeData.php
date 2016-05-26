<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Employee;
use AppBundle\Entity\Person;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEmployeeData implements FixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $employee = new Employee();

        $manager->persist($employee);
        $manager->flush();

        $person = new Person();

        $manager->persist($person);
        $manager->flush();
    }
}