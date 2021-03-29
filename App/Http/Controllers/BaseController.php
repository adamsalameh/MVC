<?php
/**
 * Created by A Salameh.
 */

namespace App\Http\Controllers;

use Core\DataBinderInterface;
use Core\ViewInterface;
use Database\PDODatabase;

abstract class BaseController
{
    /**
     * @var PDODatabase
     */
    protected $db;

    /**
     * @var ViewInterface
     */
    private $view;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    public function __construct(PDODatabase $db, ViewInterface $view, DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->view = $view;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $viewName, $data = null, array $errors = []){
        $this->view->render($viewName, $data, $errors);
    }

    public function redirect(string $url){
        header('location: '.URLROOT.'/'.$url);
    }
}