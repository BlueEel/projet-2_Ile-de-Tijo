<?php

namespace App\Model;

class AdminBookingManager extends AbstractManager
{
    public const TABLE = 'booking';

    /**
     * Select bookings
     */
    public function index()
    {
        $query = "SELECT * FROM " . self::TABLE;
        return $this->pdo->query($query)->fetchAll();
    }

    /**
     * Delete booking
     */
    public function del(int $id)
    {
        $query = "DELETE FROM " . self::TABLE . " WHERE id = $id";
        return $this->pdo->query($query)->execute();
    }
}
