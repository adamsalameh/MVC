<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Models;

use Database\DatabaseInterface;
use PDOException;
use App\DTO\PostDTO;
use Core\DataBinderInterface;

class Post
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
     * @return \Generator|PostDTO[]
     */
    public function all(): \Generator
    {
        return $this->db->query("
            SELECT posts.id, posts.user_id, users.name, posts.title, posts.slug, posts.views, posts.image, posts.body, posts.status, posts.created_at, posts.updated_at
            FROM posts
            INNER JOIN users ON posts.user_id = users.id;
        ")->execute([])
           ->fetch(PostDTO::class);       
    }

    /**
     * @return \Generator|PostDTO[]
     */
    public function search(string $title): \Generator
    {
        return $this->db->query("
            SELECT posts.id, posts.user_id, users.name, posts.title, posts.slug, posts.views, posts.image, posts.body, posts.status, posts.created_at, posts.updated_at
            FROM posts
            INNER JOIN users ON posts.user_id = users.id
            WHERE posts.title LIKE ?
        ")->execute(["%$title%"])
           ->fetch(PostDTO::class);       
    }

    public function create(PostDTO $postDTO): bool
    {
        return $this->db->query("
            INSERT INTO posts(user_id, category_id, title, slug, image, body)
            VALUES (?, ?, ?, ?, ?, ?)
        ")->executeResult([
            $postDTO->getUserId(),
            $postDTO->getCategoryId(),
            $postDTO->getTitle(),
            $postDTO->getSlug(),
            $postDTO->getImage(),
            $postDTO->getBody()
        ]);        
    }

    public function find(int $id): ?PostDTO
    {
        return $this->db->query("
            SELECT posts.id, posts.user_id, users.name, posts.category_id, categories.title as category_title, posts.title, posts.slug, posts.views, posts.image, posts.body, posts.status, posts.created_at, posts.updated_at
            FROM posts
            INNER JOIN users ON posts.user_id = users.id
            INNER JOIN categories ON posts.category_id = categories.id
            WHERE posts.id = ?
        ")->execute([$id])
            ->fetch(PostDTO::class)
            ->current();
    }

    public function findBySlug(string $slug): ?PostDTO
    {
        return $this->db->query("
            SELECT posts.id, posts.user_id, users.name, posts.category_id, categories.title as category_title, posts.title, posts.slug, posts.views, posts.image, posts.body, posts.status, posts.created_at, posts.updated_at
            FROM posts
            INNER JOIN users ON posts.user_id = users.id
            INNER JOIN categories ON posts.category_id = categories.id
            WHERE posts.slug = ?
        ")->execute([$slug])
            ->fetch(PostDTO::class)
            ->current();
    }

    public function findOneWhere(string $key, string $value): ?PostDTO
    {
        return $this->db->query("
            SELECT id, user_id, title, slug, views, image, body, status, created_at, updated_at 
            FROM posts
            WHERE $key = ?
        ")->execute([$value])
            ->fetch(PostDTO::class)
            ->current();
    }

    public function findByTitle(string $title): ?PostDTO
    {
        return $this->db->query("
            SELECT id, user_id, title, slug, views, image, body, status, created_at, updated_at
            FROM posts
            WHERE title = ?
        ")->execute([$title])
            ->fetch(PostDTO::class)
            ->current();
    }

    public function update(int $id, PostDTO $postDTO): bool
    {
        return $this->db->query("
            UPDATE posts
            SET 
              title = ?,
              slug = ?,
              category_id = ?,
              image = ?,
              body = ?
              -- status = ?
            WHERE id = ?
        ")->executeResult([
            $postDTO->getTitle(),
            $postDTO->getSlug(),
            $postDTO->getCategoryId(),
            $postDTO->getImage(),
            $postDTO->getBody(),
            // $postDTO->getStatus(),
            $id
        ]);
    }

    public function delete(int $id): bool
    {
       return $this->db->query("DELETE FROM posts WHERE id = ?")->executeResult([$id]);       
    }

    /**
     * @return \Generator|PostDTO[]
     */
    public function findAllByCategory($category_id): \Generator
    {
        return $this->db->query("
            SELECT posts.id, posts.user_id, users.name, posts.title, posts.slug, posts.views, posts.image, posts.body, posts.status, posts.created_at, posts.updated_at
            FROM posts
            INNER JOIN users ON posts.user_id = users.id
            WHERE category_id = ? 
        ")->execute([$category_id])
           ->fetch(PostDTO::class);       
    }

    public function count(): int
    {
        $count = $this->db->query("
            SELECT *
            FROM posts
        ");
        $count->execute([]);
        return $count->rowCount();
    }
}