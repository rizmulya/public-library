<?php
class joinTables {
    private $conn;

    public function __construct($database) {
        $this->conn = $database->getConnection();
    }

    public function join($tables, $join_conditions, $select_columns = "*", $conditions = "", $order_by = "", $limit = "") {
        $sql = "SELECT $select_columns FROM $tables[0]";
        for ($i = 1; $i < count($tables); $i++) {
            $sql .= " LEFT JOIN {$tables[$i]} ON {$join_conditions[$i-1]}";
        }
        if (!empty($conditions)) {
            $sql .= " WHERE $conditions";
        }
        if (!empty($order_by)) {
            $sql .= " ORDER BY $order_by";
        }
        if (!empty($limit)) {
            $sql .= " LIMIT $limit";
        }
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }

}

?>