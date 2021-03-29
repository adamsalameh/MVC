<?php
/**
 * Created by A Salameh.
 */

namespace Database;

interface ResultSetInterface
{
    public function fetch($className) : \Generator;    
}