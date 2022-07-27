<?php

namespace App\DataFixtures;
use App\Entity\Frequency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;


    class FrequencyFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $frequency = new Frequency();
            $frequency->setType('hebdomadaire');
            $manager->persist($frequency);

            $frequency = new Frequency();
            $frequency->setType('1 fois par semaine');
            $manager->persist($frequency);

            $frequency = new Frequency();
            $frequency->setType('1 fois par quinzaine');
            $manager->persist($frequency);

            $frequency = new Frequency();
            $frequency->setType('1 fois par mois');
            $manager->persist($frequency);

            $frequency = new Frequency();
            $frequency->setType('ponctuel');
            $manager->persist($frequency);
            

            $manager->flush();


        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['frequencyGroup'];
        }
    }