<?php

namespace App\Controller;

use App\Model\BookingManager;

class BookingController extends AbstractController
{
    /**
     * Formulaire de réservation de la page d'accueil
     */
    public function index(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $booking = array_map('trim', $_POST);

            if (empty($booking['lastname'])) {
                $errors[] = 'Le champ "Nom" est obligatoire';
            }
            if (empty($booking['firstname'])) {
                $errors[] = 'Le champ "Prénom" est obligatoire';
            }
            if (empty($booking['phone'])) {
                $errors[] = 'Le champ "Téléphone" est obligatoire';
            }
            if (empty($booking['email'])) {
                $errors[] = 'Le champ "Email" est obligatoire';
            }
            if (empty($booking['date'])) {
                $errors[] = 'Le champ "Date" est obligatoire';
            }
            if (empty($booking['time'])) {
                $errors[] = 'Le champ "Horaire" est obligatoire';
            }

            if (empty($errors)) {
                $bookingManager = new BookingManager();
                $bookingManager->insert($booking);
                header('Location: /reservation');
            }
        }
        return $this->twig->render('Booking/index.html.twig', [
            'errors' => $errors,
        ]);
    }
    /*public function getBookings()
    {
        return $this->bookings;
    }*/
    /**
     * Set the value of bookings
     *
     * @return  self
     */
    /*public function setBookings($bookings)
    {
        $this->bookings = $bookings;
        return $this;
    }*/
    /**
     * Get the value of errors
     */
    /*public function getErrors()
    {
        return $this->errors;
    }*/
}
