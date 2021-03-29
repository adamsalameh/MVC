<?php
/**
 * Created by A Salameh.
 *
 */

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Models\User;
use App\DTO\PostDTO;
use App\DTO\CommentDTO;
use App\DTO\CategoryDTO;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Validators\PostFormValidator;
use App\Http\Validators\CategoryFormValidator;


class DashboardController extends BaseController
{
    public function __construct($db, $view, $dataBinder)
    {
        parent::__construct($db, $view, $dataBinder);
        $user = new User($this->db);

        if (!isset($_SESSION['user_id'])) {
            $this->redirect("posts/index");
        }

        $userDTO = $user->find($_SESSION['user_id']);

        // check if the user is admin
        if (!$userDTO->getRole()) {       
            $this->redirect("posts/index");
        }        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $postModel = new Post($this->db);
        $userModel = new User($this->db);        
        $categoryModel = new Category($this->db);
        $commentModel = new Comment($this->db);
        $postCount = $postModel->count();
        $userCount = $userModel->count();
        $categoryCount = $categoryModel->count();
        $commentCount = $commentModel->count();
        $users =  $userModel->all();        
      

        
        $data = [
             'postCount' => $postCount,
             'userCount' => $userCount,
             'categoryCount' => $categoryCount,
             'commentCount' => $commentCount,
             'users' => $users,


        ];
        $this->render("dashboard/index", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPosts()
    {
        $post = new Post($this->db);
        $posts =  $post->all();
        $category = new Category($this->db);
        $categories = $category->all();
        $data = [
            'posts' => $posts,
            'categories' => $categories

        ];
        $this->render("posts/all", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
        $model = new Category($this->db);
        $data =  $model->all(); 
        $this->render("posts/add", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPost()
    {        
        $category = new Category($this->db);
        $cat = $category->all();

        $validate = new PostFormValidator();
        
        $post = new Post($this->db);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            
            if (!$validate->validate($_POST)) {
                $data = $validate->getErrors();
                return $this->render("posts/add", $data);
            }            
            //bind form data to PDO object
            $postDTO = $this->dataBinder->bind($_POST, PostDTO::class);
            if ($post->findByTitle($postDTO->getTitle()) !== null) {
                flash('post_message', 'the post is exist already');
                return $this->render("posts/add");
            }
            
            $postDTO->setUserId($_SESSION['user_id']);
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $postDTO->getTitle())));
            $postDTO->setSlug($slug);
            // rename for the image file
            $imageFile = "Resources/Views/Uploads/". basename($_FILES["fileToUpload"]["name"]);           
            // validate the image
            if (!$validate->validateImage($imageFile)) {
                $data = $validate->getErrors();
                return $this->render("posts/add", $data);
            }  
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageFile);
            $postDTO->setImage($imageFile);
            echo $post->create($postDTO);
            
            flash('post_message', 'Your is added successfully!');        
            $this->redirect("posts/index");
        } else {
            return $this->render("posts/add", $cat);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPost($id)
    {

        $postModel = new Post($this->db);
        $post =  $postModel->find($id);
        $commentModel = new Comment($this->db);
        $comments =  $commentModel->findAllByPost($post->getId());
        $categoryModel = new Category($this->db);
        $categories = $categoryModel->all();
        $data = [
            'post' => $post,
            'comments' => $comments,
            'categories' => $categories
        ];

        $this->render("posts/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost($id)
    {
        
        
        $validate = new PostFormValidator();
        $postModel = new Post($this->db);
        $post =  $postModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            
            if (!$validate->validate($_POST)) {
                $data = $validate->getErrors();
                return $this->render("posts/update", $data);
            }            
            //bind form data to PDO object
            $postDTO = $this->dataBinder->bind($_POST, PostDTO::class);
                        
            $postDTO->setUserId($_SESSION['user_id']);
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $postDTO->getTitle())));
            $postDTO->setSlug($slug);
            // rename for the image file
            $imageFile = "Resources/Views/Uploads/". basename($_FILES["fileToUpload"]["name"]);
            
            //$validate the Image
            if (!$validate->validateImage($imageFile)) {
                $data = $validate->getErrors();
                return $this->render("posts/update", $data);
            }  
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageFile);
            $postDTO->setImage($imageFile);
            $postModel->update($id, $postDTO);
            flash('post_message', 'Your post updated successfully!');        
            $this->redirect("posts/index");
        } else {
            return $this->render("posts/update", $cat);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPost($id)
    {
        $post = new Post($this->db);
        if (isset($id)) {
            $post->delete($id);        
            flash('post_message', 'Your post deleted successfully!', 'alert alert-warning');        
        } else {       
            flash('post_message', 'Error Your post didn\'t deleted successfully!', 'alert alert-warning');
        }             
        $this->redirect("dashboard/allPosts");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allCategories()
    {
        $model = new Category($this->db);
        $data =  $model->all();
        $this->render("categories/all", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        //$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        $this->render("categories/add");
    }

    /**
     * Store a newly created resource in storage.
     *     
     * @return \Illuminate\Http\Response
     */
    public function addCategory()
    {
        $validate = new CategoryFormValidator();        
        $category = new Category($this->db);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if (!$validate->validate($_POST)) {
                $data = $validate->getErrors();
                return $this->render("categories/add", $data);
            }            
            //bind form data to PDO object
            $categoryDTO = $this->dataBinder->bind($_POST, CategoryDTO::class);
            if ($category->findByTitle($categoryDTO->getTitle()) !== null) {
                flash('category_success', 'the category is exist already');
                return $this->render("categories/add");
            }
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $categoryDTO->getTitle())));
            $categoryDTO->setSlug($slug);
            $data =  $category->create($categoryDTO);            
            flash('category_success', 'New Category Added!');        
            return $this->redirect("dashboard/allCategories");
        } else {
            return $this->render("categories/add");

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {

        $categoryModel = new Category($this->db);
        $category =  $categoryModel->find($id);
        $data = $category;
        $this->render("categories/edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory($id)
    {
        
        
        $validate = new CategoryFormValidator();
        $categoryModel = new Category($this->db);
        $category =  $categoryModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {             
            if (!$validate->validate($_POST)) {
                $data = $validate->getErrors();
                return $this->render("dashboard/editCategory", $data);
            }            
            //bind form data to PDO object
            $categoryDTO = $this->dataBinder->bind($_POST, CategoryDTO::class);
                        
            
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $categoryDTO->getTitle())));
            $categoryDTO->setSlug($slug);            
            
            
           
            $categoryModel->update($id, $categoryDTO);            
            flash('post_message', 'Your post updated successfully!');        
            $this->redirect("dashboard/allCategories");
        } else {
            return $this->render("dashboard/editCategory", $cat);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCategory($id)
    {
        $category = new Category($this->db);
        if (isset($id)) {
            $data = $category->delete($id);
            var_dump($data);
            die();        
            flash('post_message', 'Your category deleted successfully!');        
        } else {       
            flash('post_message', 'Error Your category didn\'t deleted successfully!');
        }             
        $this->redirect("dashboard/allCategories");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allComments()
    {
        $model = new Comment($this->db);
        $data =  $model->all();        
        $this->render("comments/all", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approveComment($id)
    {           
        $commentModel = new Comment($this->db);
        $comment =  $commentModel->find($id);    
                      
        //bind form data to PDO object
        $commentDTO = $this->dataBinder->bind($_POST, commentDTO::class);
        $commentDTO->setStatus(1);  
        $commentModel->update($id, $commentDTO);
        flash('post_message', 'Your post updated successfully!');        
        $this->redirect("dashboard/allComments");        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyComment($id)
    {
        $comment = new Comment($this->db);
        if (isset($id)) {
            $comment->delete($id);        
            flash('post_message', 'Your comment deleted successfully!');        
        } else {       
            flash('post_message', 'Error Your comment didn\'t deleted successfully!');
        }             
        $this->redirect("dashboard/allComments");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = new User($this->db);
        if (isset($id)) {
            $user->delete($id);        
            flash('post_message', 'User deleted successfully!');        
        } else {       
            flash('post_message', 'Error Your User didn\'t deleted successfully!');
        }             
        $this->redirect("dashboard/index");
    }
}
