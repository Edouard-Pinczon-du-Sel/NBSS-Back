<?php

namespace App\DataFixtures;
use App\Entity\Housekeeping;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
//NOTE a supprimé au deploiment final

    class HousekeepingFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $housekeeping = new Housekeeping();
            $housekeeping->setNumberHour('3');
            $housekeeping -> setContent('a l\'etage');
            $manager->persist($housekeeping);

            $housekeeping = new Housekeeping();
            $housekeeping->setNumberHour('1');
            $housekeeping -> setContent('pour la vaisselle car le lave vaiselle est en panne ');
            $manager->persist($housekeeping);


            
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