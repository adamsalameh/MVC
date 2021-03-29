<?php
/**
 * Created by A Salameh.
 */

namespace Core;

class View implements ViewInterface
{
    const VIEW_FOLDER = "Resources/Views/";
    const VIEW_EXTENSION = ".php";

    public function render(string $viewName, $data, array $errors = [])
    {
        require_once self::VIEW_FOLDER
            . $viewName
            . self::VIEW_EXTENSION;
    }
}