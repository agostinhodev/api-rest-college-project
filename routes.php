<?php

    $app = isset($_GET['app']) ? (int)$_GET['app'] : 1;

    switch($app){

        case 1:
        default: 

            require_once './app/listar.php';

        break;

        case 2:

            require_once './app/novoPost.php';

        break;

        case 3:

            require_once './app/enviarMensagem.php';

        break;
            
            

    }