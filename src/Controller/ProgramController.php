<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
  #[Route('/', name: 'index')]
  public function index(ProgramRepository $programRepository): Response
  {
    $programs = $programRepository->findAll();

    return $this->render('program/index.html.twig', ['programs' => $programs]);
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
      'program' => $program,]);
      
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
}