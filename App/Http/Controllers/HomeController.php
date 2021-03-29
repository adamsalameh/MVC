<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Http\Controllers;

use App\DTO\PostDTO;
use App\DTO\CommentDTO;
use App\DTO\CategoryDTO;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Validators\PostFormValidator;


class HomeController extends BaseController
{    
    public function index()
    { 
        $post = new Post($this->db);
        $posts =  $post->all();
        $category = new Category($this->db);
        $categories = $category->all();
        $data = [
            'posts' => $posts,
            'categories' => $categories
        ];    
        
        $this->render("home/index", $data);
    }

    public function about()
    {
        echo "welcome us!";           
        
    }
}
