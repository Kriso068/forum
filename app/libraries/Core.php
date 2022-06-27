<?php

/**
 * App Core Class
 * Create URL and loads core controller
 * URL FORMAT - /controller/method/params
 */

class core
{
    protected $currentController= 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $url = (empty($this->getUrl())) ? ['users','login'] : $this->getUrl();

        //Look in file controllers if the first index [0] of the array is a page
        //Example Post.php
        //put fist letter on uppercase
        if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
            //if it's true then set as controller
            $this->currentController = ucwords($url[0]);
            //need unset after this the index [0] for not get an arror after
            unset($url[0]);
        }

        //we require the controller of the currentController if file exist as we set it before
        require_once '../app/controllers/'.$this->currentController.'.php';

        //and we need instantiate the controller class
        $this->currentController = new $this->currentController;

        //Check for the second part of URL on index [1] of our array, witch is our method ($currentMethod)
        if (isset($url[1])) {
            //we will check if the method exists in our controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                //need unset after this the index [1] for not get an arror after
                unset($url[1]);
            }
        }

        //get paramaters
        //returns all values of an array here we want the URL array if not then will be an empty array
        $this->params = $url ? array_values($url) :[];

        //call a callback with array of paramaters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }
    
    /**
     * Function to getUrl
     *
     * @return void
     */
    public function getUrl()
    {
        //If url is in url
        if (isset($_GET['url'])) {
            //remove the trailing slash
            $url = rtrim($_GET['url'], '/');
            //sanitize the url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //explode the URL into an array at this /
            $url = explode('/', $url);
            return $url;
        }
    }
}