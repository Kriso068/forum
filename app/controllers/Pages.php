<?php

/**
 * Pages
 */

class Pages extends Controller
{
        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
       
    }

       
    /**
     * Index
     *
     * @return void
     */
    public function index()
    {

        if (isLoggedIn()) {
            redirect('posts');
        }
        $data = [
            'title' => 'Welcome',
            'description' => 'Basic Forum' 
        ];


        $this->view('pages/index', $data);
    }
    
    /**
     * About
     *
     * @return void
     */
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'Web junior' 
        ];
        $this->view('pages/about', $data);
    }
}
