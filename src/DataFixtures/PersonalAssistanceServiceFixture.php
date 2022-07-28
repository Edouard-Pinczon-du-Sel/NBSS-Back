<?php

namespace App\DataFixtures;
use App\Entity\PersonalAssistanceService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
//NOTE a supprimé au deploiment final

    class PersonalAssistanceServiceFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
            $personalAssistanceService= new PersonalAssistanceService();
            $personalAssistanceService->setFinancialHelp('1');
            $personalAssistanceService -> setContent('');
            $personalAssistanceService -> setOrganization('Mutuelle');
            $personalAssistanceService -> setNumberHour('2');
            $manager->persist($personalAssistanceService);

            $personalAssistanceService= new PersonalAssistanceService();
            $personalAssistanceService->setFinancialHelp('0');
            $personalAssistanceService -> setContent('');
            $personalAssistanceService -> setOrganization('');
            $personalAssistanceService -> setNumberHour('0');
            $manager->persist($personalAssistanceService);
            
            $manager->flush();
        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['personalAssistanceService Group'];
        }
    }