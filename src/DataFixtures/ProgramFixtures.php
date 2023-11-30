<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAM = [
        ['title' => 'Le Dernier Samouraï', 'synopsis' => 'En 1876, Nathan Algren, un vétéran de l\'armée américaine, part pour le Japon afin d\'assister l\'armée impériale qui cherche à écraser une révolte de Samouraï, en guerre contre l\'occidentalisation. Capturé par les rebelles impressionnés par son courage, Nathan change de camp et décide de rejoindre leur combat.', 'category' => 'category_Action'],
        ['title' => ' Indiana Jones et la Dernière Croisade', 'synopsis' => 'En 1912 dans l\'Utah, Indiana Jones, adolescent, surprend des pilleurs de trésors archéologiques avant d\'être poursuivi par les trafiquants. 26 ans plus tard, Jones apprend que son père, le professeur Henry Jones, parti à la recherche du Saint Graal, a disparu et il se rend alors à Venise où son père a été vu pour la dernière fois.', 'category' => 'category_Aventure'],
        ['title' => 'Mon voisin Totoro', 'synopsis' => 'Un professeur d\'université, M. Kusakabe, et ses deux filles, Satsuki, onze ans, et Mei, quatre ans, s\'installent dans leur nouvelle maison à la campagne. Celle-ci est proche de l\'hôpital où leur mère est hospitalisée. Les deux enfants vont alors faire la rencontre des esprits de la forêt.', 'category' => 'category_Animation'],
        ['title' => 'L\'Histoire sans fin', 'synopsis' => 'Un jeune passionné de romans d\'aventures dérobe un ouvrage merveilleux peuplé d\'extraordinaires créatures et s\'enfonce dans son univers fantastique.', 'category' => 'category_Fantastique'],
        ['title' => 'Freddy, Les Griffes de la nuit', 'synopsis' => 'Nancy Thompson est une jeune adolescente qui fait régulièrement des cauchemars sur un homme au visage brûlé, avec cinq lames tranchantes à la place des doigts. Or ses amis Tina, Rod et Glen font les mêmes cauchemars. C\'est ainsi que le groupe fait la connaissance de l\'ignoble Freddy Krueger, qui se sert des cauchemars pour assassiner ses victimes durant leur sommeil. Nancy comprend qu\'elle n\'a plus qu\'une seule solution si elle veut rester en vie : rester éveillée.', 'category' => 'category_Horreur'],

    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAM as $programList) {
            $program = new Program();
            $program->setTitle($programList['title']);
            $program->setSynopsis($programList['synopsis']);
            $program->setCategory($this->getReference($programList['category']));
            $manager->persist($program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
