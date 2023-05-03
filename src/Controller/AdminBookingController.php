<?php

namespace App\Controller;

use App\Model\AdminBookingManager;

class AdminBookingController extends AbstractController
{
    /**
     * List bookings
     */
    public function index()
    {
        $adminBookingManager = new AdminBookingManager();
        $bookings = $adminBookingManager->index();

        return $this->twig->render('Admin/bookings/index.html.twig', [
            'bookings' => $bookings,
        ]);
    }

    /**
     * Delete a specific booking
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $adminBookingManager = new AdminBookingManager();
            $adminBookingManager->del((int)$id);

            header('Location:/admin');
        }
    }

    /**
     * Show booking
     */
    /*public function show(int $id): string
    {
        $adminManager = new AdminManager();
        $item = $adminManager->selectOneById($id);

        return $this->twig->render('Admin/show.html.twig', ['item' => $item]);
    }*/
}
