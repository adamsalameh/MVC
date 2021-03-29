<?php
/**
 * Created by A Salameh.
 */

namespace Database;

class PDOPreparedStatement implements StatementInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }

    public function execute(array $params = []): ResultSetInterface
    {
        $this->pdoStatement->execute($params);        
        return new PDOResultSet($this->pdoStatement);
    }

    public function executeResult(array $params = []): bool
    {
        return $this->pdoStatement->execute($params);
    }

    public function rowCount(array $params = []): int
    {
        return $this->pdoStatement->rowCount();
    }
}