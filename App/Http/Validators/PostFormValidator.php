<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Http\Validators;

class PostFormValidator
{
    const MAX_FIELD_LENGTH = 255;
    const NAME_MIN_LENGTH = 3;
    const EMAIL_MIN_LENGTH = 6;
    const PASSWORD_MIN_LENGTH = 6;

    private $data = [
        'title' => '',        
        'title_err' => '',
        'body_err' => '',
        'image_err' => '',
        'comment_err' => ''
    ];
    

    public function validate($data): bool
    {
        if (empty($data["title"])) {
            $this->data['title_err'] = "title is required";
            return false;
        }
        if (mb_strlen($data["title"]) < self::NAME_MIN_LENGTH 
            || mb_strlen($data["title"]) > self::MAX_FIELD_LENGTH
        ) {
            $this->data['title_err'] = "title is too short";
            return false;
        }
        $title = self::test_input($data["title"]);
        // check name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
            $this->data['title_err'] = "Only letters and white space allowed";
            return false;
        }

        if (empty($data["body"])) {
            $this->data['body_err'] = "body is required";
            return false;
        }
        if (mb_strlen($data["body"]) < self::NAME_MIN_LENGTH) {
            $this->data['body_err'] = "body is too short";
            return false;
        }

        $body = self::test_input($data["body"]);
             
        return true;
    }

    public function validateComment($data)
    {
        if (empty($data["body"])) {
            $this->data['comment_err'] = "comment is required";
            return false;
        }
        if (mb_strlen($data["body"]) < self::NAME_MIN_LENGTH) {
            $this->data['comment_err'] = "comment is too short";
            return false;
        }
        $body = self::test_input($data["body"]);
              
        return true;
    }

    public function validateImage($file)
    {
        $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" 
            && $imageFileType != "png" 
            && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $this->data['image_err'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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