<?php
/**
 * Created by A Salameh.
 */

session_start();
require_once 'Helpers/session_helper.php';
require_once 'Config/app.php';

spl_autoload_register(function($class) {
    $parts = explode('\\', $class);
   
    if(count($parts) > 1) {
      $classfile = array_shift($parts) . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts) . ".php";
     
    } else {
      $classfile = 'classes' . DIRECTORY_SEPARATOR . $class . '.php';
    }
    if(FALSE === stream_resolve_include_path($classfile)) return;
    include $classfile;
  });

$url = $_SERVER['REQUEST_URI'];
$url_data = explode('/',$url);
array_shift($url_data);
$app_root = array_shift($url_data);
define('APP_ROOT',$app_root);
$controller = $url_data[0]??'Home'?:'Home';
$method = $url_data[1]??'index'?:'index';

$param = $url_data[2]??null;

$controller_name = ucfirst($controller);
$controller = 'App\\Http\\Controllers\\'.$controller_name.'Controller';

if (!class_exists($controller)) {
    header("Location: ".URLROOT);
    exit();

}

if (!method_exists($controller, $method)) {
     header("Location: ".URLROOT);
    exit();
}

$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);
$dataBinder = new \Core\DataBinder();

$view = new \Core\View();
$controller_obj = new $controller($db, $view, $dataBinder);
$controller_obj->$method($param);
