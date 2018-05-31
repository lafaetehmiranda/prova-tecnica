<?php
    $contents = file_get_contents('filmes.json');

    $json = json_decode($contents, true); 

    $method = $_SERVER['REQUEST_METHOD'];

    header('Content-type: application/json');
    $body = file_get_contents('php://input');

    if($method ==='GET'){
        echo json_encode($json);
    }

    if($method === 'POST'){
        $jsonBody = json_decode($body, true);
        $jsonBody['id'] = time();
        echo json_encode($jsonBody);
        $json[] = $jsonBody;
        file_put_contents('filmes.json', json_encode($json));
    }

    if($method === 'PUT'){
        
    }
?>