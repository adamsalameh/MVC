<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Models;

use Database\DatabaseInterface;
use PDOException;
use App\DTO\UserDTO;

class User
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * Users constructor.
     * @param $db_connection
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function all(): \Generator
    {
        return $this->db->query("
            SELECT id, name, email, password, role, created_at
            FROM users
        ")->execute([])
            ->fetch(UserDTO::class);
    }

    public function create(UserDTO $userDTO): bool
    {
        return $this->db->query("
            INSERT INTO users(name, email, password)
            VALUES (?, ?, ?)
        ")->executeResult([
            $userDTO->getName(),
            $userDTO->getEmail(),
            $userDTO->getPassword()
        ]);       
    }

    public function find(int $id): ?UserDTO
    {
        return $this->db->query("
            SELECT id, name, email, password, role, created_at 
            FROM users
            WHERE id = ?
        ")->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneWhere(string $key, string $value): ?UserDTO
    {
        return $this->db->query("
            SELECT id, name, email, password, role, created_at 
            FROM users
            WHERE $key = ?
        ")->execute([$value])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findByEmail(string $email): ?UserDTO
    {
        return $this->db->query("
            SELECT id, name, email, password, role, created_at 
            FROM users
            WHERE email = ?
        ")->execute([$email])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        return $this->db->query("
            UPDATE users
            SET 
              name = ?,
              email = ?,
              password = ?,
              role = ?
            WHERE id = ?
        ")->executeResult([
            $userDTO->getName(),
            $userDTO->getEmail(),
            $userDTO->getPassword(),
            $userDTO->getRole(),
            $id
        ]);        
    }

    public function delete(int $id): bool
    {
       return $this->db->query("DELETE FROM users WHERE id = ?")->executeResult([$id]);       
    }

    public function count(): int
    {
        $count = $this->db->query("
            SELECT *
            FROM users
        ");
        $count->execute([]);
        return $count->rowCount();
    }
}