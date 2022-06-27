<?php

/**
 * Posts
 */
class Posts extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }
    
    /**
     * Function index is the arrival page
     *
     * @return void
     */
    public function index()
    {
        // Get posts
        $posts = $this->postModel->getPosts();

        $data = [
          'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }
    
    /**
     * Function to add a post
     *
     * @return void
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => '',
                'body_error' => ''
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter title';
            }

            if (empty($data['body'])) {
                $data['body_error'] = 'Please enter body text';
            }

            // Make sure no errors
            if (empty($data['title_error']) && empty($data['body_error'])) {
                // Validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/add', $data);
            }

        } else {
            $data = [
              'title' => '',
              'body' => ''
            ];
      
            $this->view('posts/add', $data);
        }
    }
    
    /**
     * Function called when we want show the post
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
          'post' => $post,
          'user' => $user
        ];
        $this->view('posts/show', $data);
    }
    
    /**
     * Function to edit a post but only from the user_id
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
              'id' => $id,
              'title' => trim($_POST['title']),
              'body' => trim($_POST['body']),
              'user_id' => $_SESSION['user_id'],
              'title_error' => '',
              'body_error' => ''
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_error'] = 'Please enter body text';
            }

            // Make sure no errors
            if (empty($data['title_error']) && empty($data['body_error'])) {
                // Validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }

        } else {
            //we need fetch the post for get the id
            $post = $this->postModel->getPostById($id);
            //check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            $data = [
              'id' => $id,
              'title' => $post->title,
              'body' => $post->body
            ];
      
            $this->view('posts/edit', $data);
        }
    }
    
    /**
     * Function to delete a post
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //we need fetch the post for get the id
            $post = $this->postModel->getPostById($id);
            //check for owner
            if ($this->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }
            
            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }

        
    /**
     * Function search for find a title
     *
     * @return void
     */
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            if (empty($_POST['title'])) {
                redirect('posts');
            }
           
            $_POST = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           
            
           // html_entity_decode($_POST ,$flags= ENT_HTML5,  $encoding = "UTF-8");

            $search = $this->postModel->searchAll($_POST);
          
            $data = [
                'posts' => $search,
            ];
            
            
            if (empty($data['posts'])) {
                flash('search_message', 'No match', $class = 'alert alert-danger text-center fs-2');
            }
            
            $this->view('posts/searchTitle', $data);  
        }
    }
}

