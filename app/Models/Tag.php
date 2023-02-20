<?php

namespace App\models;

class Tag extends Model
{
    protected string $table = 'tags';

    public function getPosts()
    {
        return $this->query("SELECT p.* FROM posts p INNER JOIN post_tag pt ON pt.post_id = p.id WHERE pt.tag_id = ?", $this->id);
    }
}