<?php 
$title = 'Nuevo enlace';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $validator = new Validator($_POST, [
        'title'         => 'required|min:3|max:255',
        'url'           => 'required|url|max:255',
        'description'   => 'required|min:15|max:500'
    ]);
       

    if ($validator->passes()) {
        $db->query(
            "INSERT INTO links (title, url, description) VALUES (?, ?, ?)",
            [
                $_POST['title'], $_POST['url'], $_POST['description']
            ]
        );

        header('Location: /links');
    
    } else {
        $errors = $validator->errors();
    }
}

require_once __DIR__ . '/../../resources/create-links.template.php';