<?php

namespace App\DataFixtures;
use App\Entity\Days;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;


    class DayFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $days = new Days();
            $days->setName('Lundi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('Mardi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('Mercredi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('jeudi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('Vendredi');
            $manager->persist($days);

            $days = new Days();
            $days->setName('Samedi');
            $manager->persist($days);
            $days = new Days();

            $days->setName('Dimanche');
            $manager->persist($days);
            $manager->flush();

            $manager->flush();


        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['daysGroup'];
        }
    }