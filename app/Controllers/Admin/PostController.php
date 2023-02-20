<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = (new Post($this->getDB()))->all();

        return $this->view('admin.post.index', compact('posts'));
    }
}