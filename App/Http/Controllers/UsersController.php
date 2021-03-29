<?php

/**
 * Created by A Salameh.
 *
 */

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Models\User;
use App\Http\Validators\UserFormValidator;

class UsersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $model = new User($this->db);
        $data =  $model->all();        
        $this->render("user/index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function register()
    {
        $validate = new UserFormValidator();
        if ($this->isLoggedIn()) {                     
            $this->redirect('');
        }

        $user = new User($this->db);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

            if (!$validate->validate($_POST)) {
                $data = $validate->getErrors();
                return $this->render("users/register", $data);
            } 

            //bind form data to PDO object
            $userDTO = $this->dataBinder->bind($_POST, UserDTO::class);

            if ($user->findByEmail($userDTO->getEmail()) !== null) {
                flash('register_error', 'the user is exist already');
                return $this->render("users/register");
            }

            //encrypt Password
            $password = $userDTO->getPassword();
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $userDTO->setPassword($passwordHash);
            $data =  $user->create($userDTO);
            flash('register_success', 'You are now registered and can log in');        
            $this->render("users/login", $data);

        } else {
            return $this->render("users/register");

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function login()
    {
        $validate = new UserFormValidator();
        if ($this->isLoggedIn()) {
            $this->redirect('');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        
            $user = new User($this->db);
            if (!$validate->validateLoginForm($_POST)) {
                $data = $validate->getErrors();    
                return $this->render("users/login", $data);
            } 
            $userDTO = $user->findByEmail($_POST['email']);
            
            if (null == $userDTO) {
               flash('register_success','Invalid credentials!', 'alert alert-danger' );
               return $this->render("users/login");
            }

            $userPasswordHash = $userDTO->getPassword();

            if (!password_verify($_POST['password'], $userPasswordHash)) {
                flash('register_success','Invalid password!', 'alert alert-danger' );
                return $this->render("users/login");
            }
            $this->createUserSession($userDTO);            
            return $this->redirect("");
        
        } else {
            
            $this->render("users/login");
        }    
    }

    /**
     * Store a newly created resource in storage.
     *     
     */
    public function store()
    {
        $user = new User($this->db);
        if (isset($_POST)) { 
            if (!UserFormValidator::validate($_POST)) {
                return $this->render("users/register");
            }            
            //bind form data to PDO object
            $userDTO = $this->dataBinder->bind($_POST, UserDTO::class);
            if ($user->findByEmail($userDTO->getEmail()) !== null) {
                flash('register_success', 'the user is exist already');
               return $this->render("users/register");
            }
            //encrypt Password
            $password = $userDTO->getPassword();
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $userDTO->setPassword($passwordHash);
            $data =  $user->create($userDTO);        
            $this->render("home/index", $data);
        }
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $model = new User($this->db);
        // $user =  $model->find($id);
        // $user->setName('ani');
        // $user->setEmail('loarak@ani.com');
        // $user->setPassword('dfdsfdfsdfd');
        // $data =  $model->update('$id', $user);
        // var_dump($user);
    }



    // Create Session With User Info
    public function createUserSession(UserDTO $userDTO)
    {
        $_SESSION['user_id'] = $userDTO->getId();
        $_SESSION['user_email'] = $userDTO->getEmail(); 
        $_SESSION['user_name'] = $userDTO->getName();
        return true;
    }

    // Logout & Destroy Session
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        return $this->redirect('users/login');
    }

    // Check Logged In
    public function isLoggedIn(): bool
    {
        return isset($_SESSION['user_id']);        
    }
}