<?php

/**
 * Post
 */
class Post
{
    private $db;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = new Database;
    }
    
    /**
     * Function getPosts
     *
     * @return void
     */
    public function getPosts()
    {
            $this->db->query(
                'SELECT *,
                posts.id as postId,
                users.id as userId,
                posts.created_at as postCreated,
                users.created_at as userCreated
                FROM posts
                INNER JOIN users
                ON posts.user_id = users.id
                ORDER BY posts.created_at DESC'
            );

        $results = $this->db->resultSet();

        return $results;
    }
    
    /**
     * Function to addPost
     *
     * @param  mixed $data
     * @return void
     */
    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)');

        //binding the values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;  
        }
    }
    
    /**
     * Function to updatePost
     *
     * @param  mixed $data
     * @return void
     */
    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');

        //binding the values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;  
        }
    }
    
    /**
     * Function to getPostById
     *
     * @param  mixed $id
     * @return void
     */
    public function getPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id); 

        $row = $this->db->single();

        return $row;
    }
    
    /**
     * Function to deletePost
     *
     * @param  mixed $id
     * @return void
     */
    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');

        //binding the values
        $this->db->bind(':id', $id);

        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;  
        }
    }
    
    /**
     * Function to search a title
     *
     * @param  mixed $data
     * @return void
     */
    public function searchAll($data)
    {
        $this->db->query(
            'SELECT p.title, p.body, p.created_at, u.name, p.id 
            FROM posts p
            INNER JOIN users u on u.id = p.user_id
            WHERE title LIKE "%'.$data.'%" ORDER BY p.created_at DESC'
        );

        $resultSearch =  $this->db->resultSet();


        return $resultSearch;
    }

}
