<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Models;

use Database\DatabaseInterface;
use PDOException;

class Model
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * Users constructor.
     * @param $db_connection
     */
    public function setConnction($db)
    {
        $this->db = $db;
    }    
}