<?php

namespace App\DataFixtures;
use App\Entity\AdministrativeDepartment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

    class AdministrativeDepartmentFixture extends Fixture implements FixtureGroupInterface
    {
        public function load(ObjectManager $manager): void
        {
                // Instaciation de l'usine de Faker
                $faker = Faker\Factory::create('fr_FR');

            $administrativeDepartment= new AdministrativeDepartment();
            // utilisation de faker pour gernéré de faux nom et prenom
            $administrativeDepartment->setFirstnameOfDeceased($faker->firstName());
            $administrativeDepartment->setLastnameOfDeceased($faker->lastname());
            $administrativeDepartment->setMaidenNameOfDeceased('');
            $administrativeDepartment->setAdressDeceased('impasse des bobby');
            $administrativeDepartment->setCityOfDeceased('bobycity');
            $administrativeDepartment->setZipCodeOfDeceased('65821');
            //utilisation de faker pour gernéré de fausse date 
            $administrativeDepartment->setDateOfBirth($faker->dateTimeBetween('-80 years'));
            $administrativeDepartment->setDateOfDeceased($faker->dateTimeBetween('-80 years'));
            $administrativeDepartment->setPlaceOfBirth('bobyland');
            $administrativeDepartment->setPlaceOfDeceased('bobycity');
            $administrativeDepartment->setFirstname($faker->firstName());
            $administrativeDepartment->setLastname($faker->lastname());;
            $administrativeDepartment->setAdress('impasse des bobby');
            $administrativeDepartment->setMail('bobette@gmail.com');
            $administrativeDepartment->setPostalCode('65821');
            $administrativeDepartment->setCity('bobycity');
            $administrativeDepartment->setContent('');
            
            $manager->persist($administrativeDepartment);

          

            $manager->flush();


        }

        /**
         * Nous permet de classer les fixtures pour pouvoir les éxecuter séparement
         *
         * @return array
         */
        public static function getGroups(): array
        {
            return ['administrativeDepartmentGroup'];
        }
    }