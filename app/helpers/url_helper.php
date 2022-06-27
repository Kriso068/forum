<?php

//Simple page redirection

/**
 * Redirect
 *
 * @param  mixed $page
 * @return void
 */
function redirect($page) 
{
    header('Location: '.URLROOT.'/'. $page);
}