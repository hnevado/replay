<?php 
$title = 'Nuevo enlace';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $errors = [];

    $title = trim($_POST['title'] ?? '');
    $url = trim($_POST['url'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Validate title
    if (empty($title)) {
        $errors[] = 'El título es obligatorio.';
    }

    // Validate URL
    if (empty($url)) {
        $errors[] = 'La URL es obligatoria.';
    } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[] = 'La URL no es válida.';
    }

    if (empty($description)) {
        $errors[] = 'La descripción es obligatoria.';
    } 
       
    // If there are no errors, save the link (this part is not implemented here)
    if (empty($errors)) {
        // Save link logic goes here
        // Redirect or show success message
        $db->query(
            "INSERT INTO links (title, url, description) VALUES (?, ?, ?)",
            [$title, $url, $description]
        );

        header('Location: /links');
    
    }
}

require_once __DIR__ . '/../../resources/create-links.template.php';