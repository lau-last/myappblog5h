<?php

namespace App\Controllers;

use Database\DBConnection;

abstract class Controller
{

    protected DBConnection $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function view(string $path, array $params = null): void
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    protected function getDB(): DBConnection
    {
        return $this->db;
    }
}