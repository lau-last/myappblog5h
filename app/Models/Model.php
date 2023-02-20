<?php

namespace App\Models;

use Database\DBConnection;
use PDO;

abstract class Model
{
    protected DBConnection $db;
    protected string $table;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", "$id", true);
    }

    public function query(string $sql, int $param = null, bool $single = null)
    {
        $methode = is_null($param) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        $stmt = $this->db->getPDO()->$methode($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($methode === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute([$param]);
            return $stmt->$fetch();
        }



    }
}