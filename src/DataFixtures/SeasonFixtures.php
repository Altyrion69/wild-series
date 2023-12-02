<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

       /* Const SEASONS = [

            ['number' => '1', 'year' => '2017', 'description' => 'Season 1' , 'program' => 'program_Stranger Things'],
            ['number' => '2', 'year' => '2018', 'description' => 'Season 2' , 'program' => 'program_Stranger Things'],
            ['number' => '3', 'year' => '2019', 'description' => 'Season 3' , 'program' => 'program_Stranger Things'],
            ['number' => '4', 'year' => '2020', 'description' => 'Season 4' , 'program' => 'program_Stranger Things'],
            ['number' => '5', 'year' => '2021', 'description' => 'Season 5' , 'program' => 'program_Stranger Things'],
            

        ];*/


public function load(ObjectManager $manager)
{

        $faker = Factory::create('Locale fr_FR'); 
        
        foreach (ProgramFixtures::PROGRAMS as $program)
        {
        for ($i = 1; $i < 5; $i++) {
        
        $season = new Season();
        $season->setNumber($i);
        $season->setYear($faker->year());
        $season->setDescription($faker->paragraph(3, true));
        $season->setProgramID($this->getReference('program_' . $program['title']));

        $manager->persist($season);
        
        $this->addReference('program_' . $program['title'] .'season_' . $i , $season);
    
    
    }
}
    $manager->flush();
}
    public function getDependencies(): array
    {
        return [
            ProgramFixtures::class,
        ];
    }
}