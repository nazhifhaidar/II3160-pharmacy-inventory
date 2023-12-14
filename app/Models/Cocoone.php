<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\CLI\CLI;

class Cocoone extends Model{
    protected $table = "pharma_data";
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }
    public function getDataCocoon(int $n_row = NULL)
    {
        $sql = "SELECT * FROM $this->table";
        if (!is_null($n_row)) {
            $sql .= " LIMIT $n_row";
        }

        $result = $this->query($sql)->getResult();
        $fieldNames = empty($result) ? [] : array_keys((array) $result[0]);

        return ['data' => $result, 'fields' => $fieldNames];
    }
}