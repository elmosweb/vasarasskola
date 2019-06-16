<?php
  class Pages extends Controller {
    public function __construct(){
      $this->postModel = $this->model('Post');
    }
    
    public function index(){

      //main view, executing the postModel, and getPosts in modelPost 
      $posts = $this->postModel->getPosts();
      //getting data from database, posts as posts
      $data = [
        'posts' => $posts
      ];
      //going to view, which is the main view in this case
      $this->view('pages/index', $data);
     
    }
 /* ==========================Adding post =================== */
  public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //Getting data, and error data, just in case
      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'title_err' => ''
      ];

      // To handle if there are no title 
      if(empty($data['title'])){
        $data['title_err'] = 'Please enter title';
      }

      // Validating if title is not empty, then adding model
      if(empty($data['title_err']) ){
        // Validated data, added to post model
        if($this->postModel->addPost($data)){
          redirect('index');
          //otherwise - catch error
        } else {
          die('Something went wrong');
        }
      } else {
        // If there are errors, displaying in the same page
        $this->view('pages/add', $data);
      }

    } else {
      $data = [
        'title' => '',
        'body' => ''
      ];
      // generating view
      $this->view('pages/add', $data);
    }
  }

 /* ==========================Editing  post =================== */

  public function edit($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitizing  POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //getting data array
      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'title_err' => ''
      ];

      // Validate data
      if(empty($data['title'])){
        $data['title_err'] = 'Please enter title';
      }

      if(empty($data['title_err']) && empty($data['body_err'])){
        // Validated
        if($this->postModel->updatePost($data)){
          redirect('pages/index');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('pages/edit', $data);
      }

    } else {
      // Get existing post from model
      $post = $this->postModel->getPostById($id);

      //getting data array
      $data = [
        'id' => $id,
        'title' => $post->title,
        'body' => $post->body
      ];
      //getting corresponding view
      $this->view('pages/edit', $data);
    }
  }

 /* ==========================Deleting  post =================== */
  public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Get existing data from post
      $post = $this->postModel->getPostById($id);
      
      // Check for owner

      //deleting, and redirectin
      if($this->postModel->deletePost($id)){
        redirect('pages');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('pages');
    }
  }
}