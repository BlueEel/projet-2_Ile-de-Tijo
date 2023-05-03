<?php 

namespace App\Model;

use PDO;

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
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        //return (int)$this->pdo->lastInsertId();
        return $statement->rowCount();
    }

}
