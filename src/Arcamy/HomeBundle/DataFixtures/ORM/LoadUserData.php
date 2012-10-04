<?php

namespace Arcamy\HomeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Arcamy\HomeBundle\Entity\User;
use Arcamy\HomeBundle\Entity\Sheet;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('test');
        $userAdmin->setEmail('test@test.fr');
        $userAdmin->setPassword('test');
        $userAdmin->setEnabled(true);

        $manager->persist($userAdmin);
        $manager->flush();
        
        
        $sheet = new Sheet();
        $sheet->setName('Tomate');
        $sheet->setDescription('Coucou');
        
        $manager->persist($sheet);
        $manager->flush();
    }
}
