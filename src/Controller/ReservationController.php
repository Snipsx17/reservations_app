<?php
namespace App\Controller;

use App\Service\ReservationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    private $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    #[Route('/', name: 'reservations')]
    public function index(Request $request): Response
    {
        $reservations = $this->reservationService->getReservationsData();
        $search = $request->query->get('search', '');

        if ($search) {
            $reservations = array_filter($reservations, function ($reservation) use ($search) {
                return stripos(implode(' ', $reservation), $search) !== false;
            });
        }

        return $this->render('index.html.twig', [
            'reservations' => $reservations,
            'search' => $search,
        ]);
    }

}