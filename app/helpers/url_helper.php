<?php 
    // Redirect function

    function redirect($page) {
        header('Location: ' . URLROOT . '/' . $page);
    }