<?php
/**
 * Created by PhpStorm.
 * User: asiftanim
 * Date: 5/1/17
 * Time: 2:46 PM
 */
    session_start();
    session_destroy();

header('Location: http://localhost/web/website');

?>