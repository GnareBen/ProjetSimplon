<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AppParticipantsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 30; $i++) {
            $participant = new Participant();
            $participant->setNom($faker->lastName);
            $participant->setPrenom($faker->firstName);
            $participant->setEmail($faker->email);
            $participant->setNumero($faker->phoneNumber);
            $participant->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($participant);
        }

        $manager->flush();
    }
}
