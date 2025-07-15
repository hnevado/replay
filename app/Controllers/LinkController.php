<?php 

class LinkController {

    public function index() {
        $db = new Database();
        $links = $db->query('SELECT * FROM links ORDER BY id DESC')->get();
        $title = 'Links';
        
        require_once __DIR__ . '/../../resources/links.template.php';
    }

    public function create() {
        $title = 'Nuevo enlace';
        require_once __DIR__ . '/../../resources/create-links.template.php';
    }

    public function store() { 
     
        $validator = new Validator($_POST, [
        'title'         => 'required|min:3|max:255',
        'url'           => 'required|url|max:255',
        'description'   => 'required|min:15|max:500'
        ]);
        

        if ($validator->passes()) {
            
            $db = new Database();

            $db->query(
                "INSERT INTO links (title, url, description) VALUES (?, ?, ?)",
                [
                    $_POST['title'], $_POST['url'], $_POST['description']
                ]
            );

            header('Location: /links');
            exit();
        }

            $errors = $validator->errors();
            $title = 'Links';
        
            require_once __DIR__ . '/../../resources/links.template.php';

    }

}
