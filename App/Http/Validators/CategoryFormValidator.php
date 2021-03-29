<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Http\Validators;

class CategoryFormValidator
{
    const MAX_FIELD_LENGTH = 255;
    const NAME_MIN_LENGTH = 3;
    const EMAIL_MIN_LENGTH = 6;
    const PASSWORD_MIN_LENGTH = 6;

    private $data = [
        'title' => '',        
        'title_err' => ''        
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