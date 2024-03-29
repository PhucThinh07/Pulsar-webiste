<?php

namespace App\Interfaces;

interface CRUDInterface{


    public function createData($table, $data);

    public function readData($table, $field, $conditions, $limit);

    public function updateData($table, $data, $conditions);

    public function deleteData($table, $conditions);
}