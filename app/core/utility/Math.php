<?php 
class Math {
    private $conn;

    public function __construct($database) {
        $this->conn = $database->getConnection();
    }

    public function totalColumn($tableName, $columnName) {
        $query = "SELECT SUM($columnName) AS total FROM $tableName";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total = $row['total'];
            return $total;
        } else {
            return 0;
        }
    }
}

 ?>