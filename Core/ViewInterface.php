<?php
/**
 * Created by A Salameh.
 */

namespace Core;

interface ViewInterface
{
    public function render(string $viewName, $data, array $errors = []);
}