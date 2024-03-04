<?php

namespace App\Models;

use PDO;
use PDOException;
use App\Interfaces\CRUDInterface;
use App\Interfaces\Database;

class BaseModel extends Database implements CRUDInterface
{

    private $_servername = "localhost";
    private $_dbname = "pulsarasm";
    private $_username = "root";
    private $_password = "mysql";

    private $_connection;

    public $pdo;


    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return \PDO
     */
    protected function connect()
    {
        $dsn       = "mysql:host=$this->_servername;dbname=$this->_dbname;charset=utf8mb4";
        $options   = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // báo lỗi khi có lỗi xảy ra
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // trả về dữ liệu dạng mảng kết hợp
        ];
        $this->pdo = new PDO($dsn, $this->_username, $this->_password, $options);

        return $this->pdo;

    }

    protected function disconnect()
    {
        $this->_connection = null;
    }

    /**
     * @param $table
     * @param $fields
     * @param $conditions
     * @param $limit
     *
     * @return array|false
     */
    protected function select($table, $fields, $conditions, $limit=0)
    {
        $pdo = $this->connect();

        $sql    = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        $where  = [];
        $params = [];
        foreach ($conditions as $key => $value) {
            $where[]  = $key . " = ?";
            $params[] = $value;
        }
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        
        if($limit !== 0 && $limit > 0){
            $sql .= " limit ".$limit;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->disconnect();

        return $result;
    }

    /**
     * @param $table
     * @param $data
     *
     * @return bool
     */
    protected function insert($table, $data)
    {
        // Chuẩn bị câu truy vấn SQL
        $columns = implode(',', array_keys($data));
        $values  = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        // Chuẩn bị và thực thi câu truy vấn với PDO
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute(array_values($data))){
            return $stmt;
        }
        return false;
    }

    /**
     * @param $table
     * @param $data
     * @param $conditions
     *
     * @return mixed
     */
    protected function update($table, $data, $conditions)
    {
        // tạo câu truy vấn
        $sql = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            $sql .= "$key = :$key, ";
        }
        $sql = rtrim($sql, ", ");
        $sql .= " WHERE ";
        foreach ($conditions as $key => $value) {
            $sql .= "$key = :$key AND ";
        }
        $sql = rtrim($sql, "AND ");

        // chuẩn bị câu truy vấn
        $stmt = $this->pdo->prepare($sql);

        // bind các giá trị
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // thực hiện câu truy vấn
        return $stmt->execute();
    }

    /**
     * @param $table
     * @param $conditions
     *
     * @return void
     */
    protected function delete($table, $conditions)
    {
        // Kết nối đến database
        $this->connect();

        // Xây dựng câu truy vấn
        $sql = "DELETE FROM {$table}";
        foreach ($conditions as $key => $value) {
            $where[]  = $key . " = ?";
            $params[] = $value;
        }
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }


        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $affected_rows = $stmt->rowCount();
            // Thực thi truy vấn và lấy số bản ghi bị ảnh hưởng
            $this->disconnect();
            return $affected_rows;
            
        } catch (PDOException $e) {
            echo "Lỗi xóa dữ liệu: " . $e->getMessage();
        }
    }

    /**
     * @param $table
     * @param $fields
     * @param $conditions
     *
     * @return mixed
     */
    protected function selectOne($table, $fields, $conditions)
    {
        $sql    = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        $where  = [];
        $params = [];
        foreach ($conditions as $key => $value) {
            $where[]  = $key . " = ?";
            $params[] = $value;
        }
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->disconnect();

        return $result;
    }

    /**
     * @param $table
     * @param $fields
     * @param $conditions
     * @param $relationTable
     * @param $relationFields
     * @param $relationConditions
     * @param $limit
     *
     * @return array|false
     */
    public function selectWithRelation($table, $fields, $conditions, $relationTable, $relationFields, $relationConditions, $limit=0)
    {
        $pdo = $this->connect();

        $sql    = "SELECT " . implode(", ", $fields) . ", " . implode(", ", $relationFields) . " FROM " . $table;
        $where  = [];
        $params = [];
        foreach ($conditions as $key => $value) {
            $where[]  = $key . " = ?";
            $params[] = $value;
        }
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        // Thực hiện kết nối đến bảng khác bằng phương thức join()
        $sql .= " JOIN " . $relationTable . " ON table_id = " . $relationTable . ".table_id";
        $where  = [];
        foreach ($relationConditions as $key => $value) {
            $where[]  = $key . " = ?";
            $params[] = $value;
        }
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        if($limit !== 0 && $limit > 0){
            $sql .= " limit ".$limit;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->disconnect();

        return $result;
    }

    /**
     * @param $table
     * @param $data
     *
     * @return void
     */
    public function createData($table, $data)
    {
        return $this->insert($table, $data);
    }

    /**
     * @param $table
     * @param $fields
     * @param $conditions
     * @param $limit
     *
     * @return array|false
     */
    public function readData($table, $fields, $conditions, $limit = 0)
    {
        return $this->select($table, $fields, $conditions, $limit);
    }

    /**
     * @param $table
     * @param $fields
     * @param $conditions
     *
     * @return mixed
     */
    public function getOne($table, $fields, $conditions){

        return $this->selectOne($table, $fields, $conditions);
    }

    /**
     * @param $table
     * @param $data
     * @param $conditions
     *
     * @return void
     */
    public function updateData($table, $data, $conditions)
    {
        $this->update($table, $data, $conditions);
    }

    /**
     * @param $table
     * @param $conditions
     *
     * @return void
     */
    public function deleteData($table, $conditions)
    {
        $this->delete($table, $conditions);
    }
}