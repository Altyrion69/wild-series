<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        ['title' => 'Stranger Things', 'synopsis' => 'À Hawkins, dans l\'Indiana, en 1983. Lorsque Will Byers disparaît de son domicile, ses amis se lancent dans une recherche semée d\'embûches pour le retrouver. Dans leur quête de réponses, les garçons rencontrent une étrange jeune fille en fuite. Les garçons se lient d\'amitié avec la demoiselle tatouée du chiffre « 11 » sur son poignet et au crâne rasé et découvrent petit à petit les détails sur son inquiétante situation. Elle est peut-être la clé de tous les mystères qui se cachent dans cette petite ville en apparence tranquille…', 'poster' => 'build/images/Stranger-things.png', 'category' => 'category_Fantastique', 'country' => 'USA', 'year' => '2016'],
        ['title' => 'Vikings', 'synopsis' => 'Scandinavie, fin du VIII° siècle. Ragnar Lothbrok, un guerrier viking, est avide de nouvelles conquêtes. Il se met en tête d\'explorer l\'Ouest par la mer.', 'category' =>'category_Action', 'country' => 'USA', 'year' => '2016'],
        ['title' => 'Sword Art Online', 'synopsis' => 'En 2022, l\'humanité a réussi à créer une réalité virtuelle. Grâce à un casque, les humains peuvent se plonger entièrement dans le monde virtuel en étant comme déconnectés de la réalité, et Sword Art Online est le premier MMORPG a utiliser ce système. Mais voila que le premier jour de jeu, 10 000 personnes se retrouvent piégées dans cette réalité virtuelle par son créateur : Akihiko Kayaba. Le seul moyen d\'en sortir est de finir le jeu. Mais ce ne sera pas facile de sortir de ce monde virtuel puisque si un joueur perd la partie, il meurt également dans la vraie vie.
        Kirito décide alors de partir à la conquête du jeu en solo, avec pour avantage le fait de faire partie des 1 000 ex-bêta-testeurs, mais arrivera-t-il à terminer les 99 donjons et leurs boss ?', 'category' =>'category_Animation', 'country' => 'USA', 'year' => '2013'],
        ['title' => 'Buffy contre les vampires', 'synopsis' => 'Buffy Summers aspire à une vie simple et épanouie auprès de sa famille et de ses amis. Mais les démons qui rôdent à Sunnydale lui rappellent sans cesse qu\'elle doit faire face à ses responsabilités de Tueuse.', 'category' =>'category_Fantastique', 'country' => 'USA', 'year' => '2016'],
        ['title' => 'Avatar : Le dernier maître de l\'air', 'synopsis' => 'Ang est un jeune Maître de l\'Air, mais c\'est surtout l\'Avatar, un être unique qui maîtrise tous les éléments - Feu, Air, Eau et Terre. Lors d\'un terrible orage, il sombre dans la mer et hiberne grâce à ses pouvoirs d\'Avatar, pour se réveiller un siècle plus tard dans un monde tyrannisé par la puissante Nation du Feu et où il est le dernier représentant de son peuple. Aidé de ses deux amis de la Tribu de l\'Eau, Ang va devoir réveiller l\'Avatar en lui, apprendre à contrôler tous les éléments et se battre contre la menace que les Maîtres du Feu font peser sur le monde', 'category' =>'category_Animation', 'country' => 'USA', 'year' => '2018'],
        ['title' => 'The Walking Dead', 'synopsis' => 'Après une apocalypse ayant transformé la quasi-totalité de la population en zombies, un groupe d\'hommes et de femmes mené par l\'officier Rick Grimes tente de survivre... Ensemble, ils vont devoir tant bien que mal faire face à ce nouveau monde devenu méconnaissable, à travers leur périple dans le Sud profond des États-Unis.', 'category' =>'category_Horreur', 'country' => 'USA', 'year' => '2015'],
        ['title' => '  Marvel\'s Daredevil', 'synopsis' => 'Avocat luttant contre l\'injustice et aveugle depuis l\'enfance, Matt Murdock fait place au super-héros Daredevil lorsque la nuit tombe sur les rues de New York.', 'category' =>'category_Action', 'country' => 'USA', 'year' => '2014'],
        ['title' => '  Spartacus', 'synopsis' => 'Puissant guerrier thrace trahi par un légat romain, Spartacus est réduit en esclavage à Capoue, et contraint de devenir gladiateur s’il veut revoir sa femme.', 'category' =>'category_Action', 'country' => 'USA', 'year' => '2015'],
        ['title' => '  Le Caméléon', 'synopsis' => 'Il existe des êtres doués d\'une intelligence supra normale, des génies qui possèdent entre uatres la faculté d\'assumer n\'importe quelle identité. En 1963, les chercheurs d\'une entreprise appelée "Le Centre" ont mis en isolement un de ces êtres, un jeune garçon nommé Jarod et exploitèrent son génie pour des recherches secrètes. Mais un jour le "Caméléon" leur échappa...', 'category' =>'category_Aventure', 'country' => 'USA', 'year' => '2013'],
        ['title' => '  The 100', 'synopsis' => 'Après une apocalypse nucléaire causée par l\'Homme lors d\'une troisième Guerre Mondiale, les 318 survivants recensés se réfugient dans des stations spatiales et parviennent à y vivre et à se reproduire, atteignant le nombre de 4000. Mais 97 ans plus tard, le vaisseau mère, The Ark, est en piteux état. Une centaine de jeunes délinquants emprisonnés au fil des années pour des crimes ou des trahisons sont choisis comme cobayes par les autorités pour redescendre sur Terre et tester les chances de survie. Dès leur arrivée, ils découvrent un nouveau monde dangereux mais fascinant...', 'category' =>'category_Fantastique', 'country' => 'USA', 'year' => '2016'],
        ['title' => '  Stargate Atlantis', 'synopsis' => 'La découverte d\'une ville inconnue amène les autorités de la Terre à la découverte d\'une nouvelle destination par la porte des étoiles. Une nouvelle équipe est constituée : Atlantis. Celle-ci se retrouve bientôt projetée dans la galaxie de Pégase, sans une possibilité immédiate de revenir en arrière. Les humains découvrent également une race très étrange et dangereuse, les Wraith, qui ont juré l\'anéantissement de toute forme de vie...', 'category' =>'category_Aventure', 'country' => 'USA', 'year' => '2016'],
        ['title' => 'The Witcher', 'synopsis' => 'Le sorceleur Geralt, un chasseur de monstres, se bat pour trouver sa place dans un monde où les humains se révèlent plus vicieux que les bêtes. Il est alors happé dans une mystérieuse toile tissée par les forces luttant pour contrôler le monde', 'category' =>'category_Aventure', 'country' => 'USA', 'year' => '2017'],
        ['title' => 'Paranormal', 'synopsis' => 'Dans les années 1960, un hématologue est impliqué dans plusieurs événements inexplicables. Bien que sceptique de nature, il devient malgré lui un expert en phénomènes surnaturels et doit résoudre une série de cas mystérieux.', 'category' =>'category_Horreur', 'country' => 'USA', 'year' => '2010'],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $programList) {
            $program = new Program();
            $program->setTitle($programList['title']);
            $program->setSynopsis($programList['synopsis']);
            
            $program->setCountry($programList['country']);
            $program->setYear($programList['year']);
            $program->setCategory($this->getReference($programList['category']));
            if (array_key_exists('poster', $programList)) {
                $program->setPoster($programList['poster']);
            }
            $manager->persist($program);
            
            $this->addReference('program_' . $programList['title'], $program);
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
