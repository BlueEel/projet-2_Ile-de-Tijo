<?php

namespace App\Model;

use PDO;

class BookingManager extends AbstractManager
{
    public const TABLE = 'booking';

    /**
     * Insert new booking in database
     */
    public function insert(array $booking): int
    {
        $sql = "INSERT INTO " . self::TABLE .
        " (`lastname`, `firstname`, `phone`, `email`, `date`, `time`, `comment`) 
        VALUES (:lastname, :firstname, :phone, 
        :email, :date, :time, :comment)";

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':lastname', $booking['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':firstname', $booking['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':phone', $booking['phone'], PDO::PARAM_STR);
        $statement->bindValue(':email', $booking['email'], PDO::PARAM_STR);
        $statement->bindValue(':date', $booking['date'], PDO::PARAM_STR);
        $statement->bindValue(':time', $booking['time'], PDO::PARAM_STR);
        $statement->bindValue(':comment', $booking['comment'], PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
