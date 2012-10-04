<?php

namespace Arcamy\HomeBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Arcamy\HomeBundle\Entity\User;
use Arcamy\HomeBundle\Entity\Sheet;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $userAdmin = $userManager->createUser();
        $userAdmin->setUsername('test');
        $userAdmin->setEmail('test@test.fr');
        $userAdmin->setPlainPassword('test');
        $userAdmin->setEnabled(true);
        $userManager->updateUser($userAdmin, true);
        $manager->persist($userAdmin);
        $manager->flush();
        
        
        $sheet = new Sheet();
        $sheet->setName('Tomate');
        $sheet->setDescription('Coucou');
        
        $manager->persist($sheet);
        $manager->flush();
    }
}
