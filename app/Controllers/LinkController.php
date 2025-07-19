<?php 
namespace App\Controllers;
use Framework\Database;
use Framework\Validator;
use Framework\Helper;
class LinkController {

    protected const LINK_RULES = [
        'title'       => 'required|min:3|max:255',
        'url'         => 'required|url|max:255',
        'description' => 'required|min:15|max:500'
    ];

    public function index() {
        $db = new Database();
        $links = $db->query('SELECT * FROM links ORDER BY id DESC')->get();
        $title = 'Links';

        Helper::view('links', [
            'links' => $links,
            'title' => $title
        ]);

        //require_once __DIR__ . '/../../resources/links.template.php';
    }

    public function create() {
        $title = 'Nuevo enlace';

        Helper::view('create-links', [
            'title' => $title
        ]);
        //require_once __DIR__ . '/../../resources/create-links.template.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            exit('Bad Request: ID is required');
        }

        $db = new Database();
        $link = $db->query('SELECT * FROM links WHERE id = ?', [$id])->firstOrFail();

        if (!$link) {
            http_response_code(404);
            exit('Link not found');
        }

        $title = 'Editar enlace';

        Helper::view('edit-links', [
            'link' => $link,
            'title' => $title
        ]);
        //require_once __DIR__ . '/../../resources/edit-links.template.php';
    }   

    public function update() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            exit('Bad Request: ID is required');
        }

        $db = new Database();
        $link = $db->query('SELECT * FROM links WHERE id = ?', [$id])->firstOrFail();

        if (!$link) {
            http_response_code(404);
            exit('Link not found');
        }

        $validator = new Validator($_POST, self::LINK_RULES);

        if ($validator->passes()) {
            $db->query(
                "UPDATE links SET title = ?, url = ?, description = ? WHERE id = ?",
                [
                    $_POST['title'], $_POST['url'], $_POST['description'], $id
                ]
            );

            header('Location: /links');
            exit();
        }

        $errors = $validator->errors();
        $title = 'Editar enlace';
        
        Helper::view('edit-links', [
            'link' => $link,
            'errors' => $errors,
            'title' => $title
        ]);
        //require_once __DIR__ . '/../../resources/edit-links.template.php';
    }   

    public function store() { 
     
        $validator = new Validator($_POST, self::LINK_RULES);
        

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
            
            Helper::view('create-links', [
              'title' => $title,
              'errors' => $errors
            ]);

           // require_once __DIR__ . '/../../resources/create-links.template.php';

    }

    public function destroy() {
        $id = $_POST['id'] ?? null;
        $token = $_POST['_token'] ?? '';

        if (!\Framework\Csrf::check($token)) {
            http_response_code(403);
            exit('CSRF token inválido');
        }

        if (!$id) {
            http_response_code(400);
            exit('Bad Request: ID is required');
        }
        
        $db = new Database();
        $db->query('DELETE FROM links WHERE id = ?', [$id]);

        header('Location: /links');
        exit();
    }

}
