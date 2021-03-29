<?php
/**
 * Created by A Salameh.
 */

namespace Database;

interface DatabaseInterface
{
    public function query(string $query) : StatementInterface;

    public function getErrorInfo() : array;
}