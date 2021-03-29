<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Models;

use Database\DatabaseInterface;
use PDOException;
use App\DTO\CategoryDTO;

class Category
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
     * @return \Generator|CategoryDTO[]
     */
    public function all(): \Generator
    {
        return $this->db->query("
            SELECT id, title, slug
            FROM categories
        ")->execute([])
            ->fetch(CategoryDTO::class);
    }

    public function create(CategoryDTO $categoryDTO): bool
    {
        return $this->db->query("
            INSERT INTO categories(title, slug)
            VALUES (?, ?)
        ")->executeResult([
            $categoryDTO->getTitle(),
            $categoryDTO->getSlug()
        ]);        
    }

    public function find(int $id): ?CategoryDTO
    {
        return $this->db->query("
            SELECT id, title, slug
            FROM categories
            WHERE id = ?
        ")->execute([$id])
            ->fetch(CategoryDTO::class)
            ->current();
    }

    public function findOneWhere(string $key, string $value): ?CategoryDTO
    {
        return $this->db->query("
            SELECT id, title, slug 
            FROM categories
            WHERE $key = ?
        ")->execute([$value])
            ->fetch(CategoryDTO::class)
            ->current();
    }

    public function findByTitle(string $title): ?CategoryDTO
    {
        return $this->db->query("
            SELECT id, title, slug
            FROM categories
            WHERE title = ?
        ")->execute([$title])
            ->fetch(CategoryDTO::class)
            ->current();
    }

    public function update(int $id, CategoryDTO $categoryDTO): bool
    {
        return $this->db->query("
            UPDATE categories
            SET 
              title = ?,
              slug = ?
            WHERE id = ?
        ")->executeResult([
            $categoryDTO->getTitle(),
            $categoryDTO->getSlug(),
            $id
        ]);        
    }

    public function delete(int $id): bool
    {
       return $this->db->query("DELETE FROM categories WHERE id = ?")->executeResult([$id]);  
    }

    public function count(): int
    {
        $count = $this->db->query("
            SELECT *
            FROM categories
        ");
        $count->execute([]);
        return $count->rowCount();
    }    
}