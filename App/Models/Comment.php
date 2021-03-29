<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Models;

use Database\DatabaseInterface;
use PDOException;
use App\DTO\CommentDTO;
use Core\DataBinderInterface;

class Comment
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
     * @return \Generator|CommentDTO[]
     */
    public function all(): \Generator
    {
        return $this->db->query("
            SELECT comments.id, comments.user_id, users.name as userName, comments.body, comments.post_id, posts.title as postTitle, comments.status, comments.created_at, comments.updated_at
            FROM comments
            INNER JOIN users ON comments.user_id = users.id
            INNER JOIN posts ON comments.post_id = posts.id
        ")->execute([])
           ->fetch(CommentDTO::class);        
    }

    public function create(CommentDTO $commentDTO): bool
    {
        return $this->db->query("
            INSERT INTO comments(user_id, post_id, body)
            VALUES (?, ?, ?)
        ")->executeResult([
            $commentDTO->getUserId(),
            $commentDTO->getPostId(),
            $commentDTO->getBody()
        ]);
    }

    public function find(int $id): ?CommentDTO
    {
        return $this->db->query("
            SELECT posts.id, posts.user_id, users.name, posts.title, posts.slug, posts.views, posts.image, posts.body, posts.status, posts.created_at, posts.updated_at
            FROM posts
            INNER JOIN users ON posts.user_id = users.id
            WHERE posts.id = ?
        ")->execute([$id])
            ->fetch(CommentDTO::class)
            ->current();
    }

    public function findOneWhere(string $key, string $value): ?CommentDTO
    {
        return $this->db->query("
            SELECT id, user_id, title, slug, views, image, body, status, created_at, updated_at 
            FROM posts
            WHERE $key = ?
        ")->execute([$value])
            ->fetch(CommentDTO::class)
            ->current();
    }

    public function findAllByPost(int $post_id)
    {
        return $this->db->query("
            
            SELECT comments.id, comments.user_id, users.name as userName, comments.body, comments.post_id, posts.title as postTitle, comments.status, comments.created_at, comments.updated_at
            FROM comments
            INNER JOIN users ON comments.user_id = users.id
            INNER JOIN posts ON comments.post_id = posts.id
            WHERE comments.post_id = ? And comments.status = 1
        ")->execute([$post_id])
            ->fetch(CommentDTO::class);
    }

    public function update(int $id, CommentDTO $commentDTO): bool
    {
        return $this->db->query("
            UPDATE comments
            SET               
              status = ?
            WHERE id = ?
        ")->executeResult([
            $commentDTO->getStatus(),
            $id
        ]);
    }

    public function delete(int $id): bool
    {
       return $this->db->query("DELETE FROM comments WHERE id = ?")->executeResult([$id]);    
    }

    public function count(): int
    {
        $count = $this->db->query("
            SELECT *
            FROM comments
        ");
        $count->execute([]);
        return $count->rowCount();
    }
}