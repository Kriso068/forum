<?php

/**
 * Base Controller 
 * This loads teh model and views
 */

class Controller
{
    //load model    
    /**
     * Function called model for loading the model
     *
     * @param  mixed $model
     * @return void
     */
    public function model($model)
    {
        // require model file 
        //we will get the model with the argument from the function
        //we will look for the nameModel ($model) in the folder models
        require_once '../app/models/'.$model.'.php';

        //we habve to instantiate the model with the function model()
        return new $model();
    }

    //load view
    //we have to give 2 arguments one will be the name of the view and the another one can be an empty array or a function inside the view    
    /**
     * Function called view for loading the view
     *
     * @param  mixed $view
     * @param  mixed $data
     * @return void
     */
    public function view($view, $data = [])
    {
        //we have to check if we have a view
        if (file_exists('../app/views/'.$view.'.php')) {

            require_once '../app/views/'.$view.'.php';
        } else {
            //view not exits
            die('View does not exist');
        }
    }

}
