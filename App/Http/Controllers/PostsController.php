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


class PostsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->render("posts/index", $data);
    }

    public function search()
    {
        if (isset($_POST)) {
            $post = new Post($this->db);
            $posts =  $post->search($_POST['search']);
            $category = new Category($this->db);
            $categories = $category->all();
            $data = [
                'posts' => $posts,
                'categories' => $categories
            ];
            $this->render("posts/category", $data);
        }        
    } 
    
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $model = new Post($this->db);
        //$post =  $model->find($id);
        $post =  $model->findBySlug($slug);
        $posts =  $model->findAllByCategory($post->getCategoryId()); 
        $model = new Comment($this->db);
        $comments =  $model->findAllByPost($post->getId());
        $category = new Category($this->db);
        $categories = $category->all();
        $data = [
            'post' => $post,
            'comments' => $comments,
            'categories' => $categories,
            'posts' => $posts
        ];
        
        $this->render("posts/show", $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     
     */
    public function addComment($post_id)
    {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect("users/login");
        }
        $model = new Post($this->db);
        $validate = new PostFormValidator();
        $comment = new Comment($this->db);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

            
            if (!$validate->validateComment($_POST)) {
                $data = $validate->getErrors();
                return $this->render("posts", $data);
            } 
            $post =  $model->find($post_id);
            $slug = $post->getSlug();
            //bind form data to PDO object
            $commentDTO = $this->dataBinder->bind($_POST, CommentDTO::class);
                        
            $commentDTO->setUserId($_SESSION['user_id']);
            $commentDTO->setPostId($post_id);
            $comment->create($commentDTO);
        } 
        flash('post_message', 'Your comment is added successfully!, wait approved');
        $this->redirect("posts/show/$slug");        
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByCategory($id)
    {
        $categoryModel = new Category($this->db);
        $categories =  $categoryModel->all();
        $postModel = new Post($this->db);
        $posts =  $postModel->findAllByCategory($id);        
        $data = [
            'posts' => $posts,
            'categories' => $categories

        ];
        $this->render("posts/category", $data);    
    }    
}