<?php

    // Start session
    session_start();

    // Include Config
    require ('config.php');
    
    require ('classes/Bootstrap.php');
    require ('classes/Controller.php');
    require ('classes/Model.php');
    require ('classes/Messages.php');
    
    require ('controllers/users.php');
    require ('controllers/books.php');
    
    require ('models/user.php');
    require ('models/book.php');

    $bootstrap = new Bootstrap($_GET);
    $controller = $bootstrap->createController();
    if($controller){
        $controller->executeAction();
    }