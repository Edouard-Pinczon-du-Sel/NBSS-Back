<?php

namespace App\DataFixtures;
use App\Entity\BabysittingService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
//NOTE a supprimé au deploiment final

    class BabysittingServiceFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $babysittingService = new BabysittingService();
            $babysittingService->setNumberChild('2');
            $babysittingService->setNumberHour('3');
            $babysittingService->setContent('il sont chauves les pauvres');
            $manager->persist($babysittingService);

            $babysittingService = new BabysittingService();
            $babysittingService->setNumberChild('4');
            $babysittingService->setNumberHour('1');
            $babysittingService->setContent('');
            $manager->persist($babysittingService);

            $babysittingService = new BabysittingService();
            $babysittingService->setNumberChild('32');
            $babysittingService->setNumberHour('4');
            $babysittingService->setContent('');
            $manager->persist($babysittingService);

            $manager->flush();


        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['babysittingServiceGroup'];
        }
    }