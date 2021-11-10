<?php

namespace App\DataFixtures;

use App\Entity\Categoriee;
use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');
        
        $catégorie = new Categoriee();
        $catégorie1 = new Categoriee();
        $catégorie2 = new Categoriee();

        $catégorie->setDesignation('amis');
        $catégorie1->setDesignation('professionnels');
        $catégorie2->setDesignation('connaissances');

        $manager->persist($catégorie);
        $manager->persist($catégorie1);
        $manager->persist($catégorie2);

        for ($i=1; $i < 20; $i++) { 
            $contact = new Contact();

            $nom = $faker->lastName();
            $prenom = $faker->firstName();
            $adresse = $faker->address();
            $codePostal = mt_rand(10000,99999);
            $ville = $faker->city();
            $telephone = $faker->e164PhoneNumber();
            $mail = $faker->freeEmail();
            $avatar = $faker->imageUrl(1000,350);
        
            $contact->setNom($nom)
                    ->setPrénom($prenom)
                    ->setAdresse($adresse)
                    ->setCodePostal($codePostal)
                    ->setVille($ville)
                    ->setTelephone($telephone)
                    ->setMail($mail)
                    ->setAvatar($avatar)
                    ->setCategoriee($catégorie);
            
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
