<?php
  class Post {
    private $db;

    public function __construct(){
      //Creating a new instance of database
      $this->db = new Database;
    }
    //SELECTING WITH MySQL values from database
    public function getPosts(){
      $this->db->query('SELECT *,
                        posts.id as postId,
                        posts.created_at as postCreated
                        FROM posts
                        ORDER BY posts.created_at DESC
                        ');
      //using set of results with using resultSet function from Database librarly
      $results = $this->db->resultSet();
      //Returning results
      return $results;
    }
    /* ============= Adding post function  ====================*/

    public function addPost($data){
      $this->db->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
      // Binding values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Executing
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    /* ============= Updating post function  ====================*/
    public function updatePost($data){
      //To update, the new values are altered to newly set ones
      $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
      // Binding values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Executing 
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getPostById($id){
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
    /* ============= Deleting post  ====================*/
    public function deletePost($id){
      //Deleting posts with corresponging id = id from database record
      $this->db->query('DELETE FROM posts WHERE id = :id');
      // Binding values
      $this->db->bind(':id', $id);

      // Executing 
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }