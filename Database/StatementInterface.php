<?php
/**
 * Created by A Salameh.
 */

namespace Database;

interface StatementInterface
{
    public function execute(array $params = []) : ResultSetInterface;
    public function executeResult(array $params = []): bool;    
    public function rowCount(array $params = []): int;
}