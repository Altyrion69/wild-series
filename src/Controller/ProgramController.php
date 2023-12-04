<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use App\Form\ProgramType;
use App\Repository\EpisodeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
use Symfony\Component\HttpFoundation\Request;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
  #[Route('/', name: 'index')]
  public function index(ProgramRepository $programRepository): Response
  {
    $programs = $programRepository->findAll();

    return $this->render('program/index.html.twig', ['programs' => $programs]);
  }

  #[Route('/new', name: 'new')]
  public function new(Request $request, EntityManagerInterface $entityManager): Response
  {
    // Create a new Category Object
    $program = new Program();
    $form = $this->createForm(ProgramType::class, $program);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
      $entityManager->persist($program);
      $entityManager->flush();

      return $this->redirectToRoute('program_index');
    }

    // Render the form
    return $this->render('program/new.html.twig', [
      'form' => $form,
    ]);
  }

  #[Route('/show/{id}', name: 'show')]
  public function show(int $id, ProgramRepository $programRepository, SeasonRepository $seasonRepository): Response
  {
    $program = $programRepository->findOneBy(['id' => $id]);
    
    // same as $program = $programRepository->find($id);

    if (!$program) {
      throw $this->createNotFoundException(
        'No program with id : ' . $id . ' found in program\'s table.'
      );
    }
    return $this->render('program/show.html.twig', [
      'program' => $program,
      ]);
      
  }

  #[Route('/{programId}/season/{seasonId}', name: 'season_show')]
    public function showSeason(int $programId, int $seasonId, ProgramRepository $programRepository, SeasonRepository $seasonRepository)
    {
        $program = $programRepository->findOneById($programId);

    if (!$program) {
      throw $this->createNotFoundException(
        'No program with id : ' . $programId . ' found in program\'s table.'
      );
    }

        $season = $seasonRepository->findOneById($seasonId);

    if (!$season) {
      throw $this->createNotFoundException(
        'No program with id : ' . $seasonId . ' found in program\'s table.'
      );
    }
    
        return $this->render('program/season_show.html.twig',[

      'program' => $program,
      'season' => $season,

  ]);
    

  }
  #[Route('program/{programId}/season/{seasonId}/episode/{episodeId}', name: 'episode_show')]
  public function showEpisode(
    int $programId,
    int $seasonId,
    int $episodeId,
    ProgramRepository $programRepository,
    SeasonRepository $seasonRepository,
    EpisodeRepository $episodeRepository
  ) {
    $program = $programRepository->find($programId);
    $season = $seasonRepository->find($seasonId);
    $episode = $episodeRepository->find($episodeId);

    return $this->render('program/episode_show.html.twig', [
      'program' => $program,
      'season' => $season,
      'episode' => $episode,
    ]);
  }
}