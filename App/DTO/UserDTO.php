<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\DTO;

class UserDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var bool
     */
    private $role;

    /**
     * @var string
     */
    private $created_at;

    /**
     * @return int $id
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;        
    }

    /**
     * @return string $name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $username
     * @return void
     * 
     */
    public function setName($name): void
    {
        $this->name = $name;        
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return void
     * 
     */
    public function setPassword($password): void
    {
        $this->password = $password;        
    }

    /**
     * @return string
     */
    public function getEmail (): string
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return void
     * 
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function getRole(): bool
    {
        return $this->role;
    }

    /**
     * @param $role
     * @return void
     * 
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }
}