<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller {
    public function before() {
        echo "(before) ";
        // return false;
    }

    public function after() {
        echo " (after)";
    }

    public function indexAction() {
        echo 'Hello from the index action in the Home controller!';
        /* View::render('Home/index.php', [
            'name' => 'Dave',
            'colours' => ['red', 'green', 'blue']
        ]); */
        View::renderTemplate('Home/index.html', [
            'name' => 'Dave',
            'colours' => ['red', 'green', 'blue']
        ]);
    }
}