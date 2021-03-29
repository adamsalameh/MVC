<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Http\Validators;

class UserFormValidator
{
    const MAX_FIELD_LENGTH = 255;
    const NAME_MIN_LENGTH = 3;
    const EMAIL_MIN_LENGTH = 6;
    const PASSWORD_MIN_LENGTH = 6;

    private $data = [
        'name_err' => '',        
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
    ];
    

    public function validate($data): bool
    {
        if (empty($data["name"])) {
            $this->data['name_err'] = "The Name is required";
            return false;
        }
        if (mb_strlen($data["name"]) < self::NAME_MIN_LENGTH 
            || mb_strlen($data["name"]) > self::MAX_FIELD_LENGTH
        ) {
            $this->data['name_err'] = "The Name at least 3 characters";
            return false;
        }
        $name = self::test_input($data["name"]);
        // check name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $this->data['name_err'] = "Only letters and white space allowed";
            return false;
        }

        if (empty($data["email"])) {
            $this->data['email_err'] = "Email is required";
            return false;
        } 
        if (mb_strlen($data["email"]) < self::EMAIL_MIN_LENGTH 
            || mb_strlen($data["email"]) > self::MAX_FIELD_LENGTH
        ) {
            $this->data['email_err'] = "Email is too short or too big";
            return false;
        }
        $email = self::test_input($data["email"]);
        // check if e-mail address syntax is valid or not
        if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $this->data['email_err'] = "Invalid email format";
            return false;
        }
        
        if (empty($data["password"])) {
            $this->data['password_err'] = "Password is required";
            return false;
        }
        if (mb_strlen($data["password"]) < self::PASSWORD_MIN_LENGTH 
            || mb_strlen($data["password"]) > self::MAX_FIELD_LENGTH
        ) {
            $this->data['password_err'] = "password is too short or too big";
            return false;
        }
        $password = self::test_input($data["password"]);
        if (empty($data['confirm_password'])) {
          $data['confirm_password_err'] = 'Please confirm password.';
          return false;            
        } 
        if ($data['password'] != $data['confirm_password']) {
            $data['confirm_password_err'] = 'Password do not match.';
            return false;
        }
        return true;
    }

    public function validateLoginForm($data): bool
    {
        if (empty($data["email"])) {
            $this->data['email_err'] = "Email is required";
            return false;
        } 
        if (empty($data["password"])) {
            $this->data['password_err'] = "Password is required";
            return false;
        }
        return true; 
    }

    public static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getErrors()
    {
        return $this->data;
    }
}
