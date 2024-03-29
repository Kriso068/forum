<?php

session_start();

//function for flash message
//Example: flash('register_success' , 'you are registered');

/**
 * Function flash
 *
 * @param  mixed $name
 * @param  mixed $message
 * @param  mixed $class
 * @return void
 */
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {

            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name.'_class'])) {
                unset($_SESSION[$name.'_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class']: '';
            echo '<div class="'.$class.' my-3" id="msg-flash">'.$_SESSION[$name].'</div>';

            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}

/**
 * Function isLoggedIn
 *
 * @return void
 */
function isLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}