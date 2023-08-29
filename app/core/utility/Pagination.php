<?php 
class Pagination {
    private $conn;
    private $table;
    private $perPage;
    private $totalData;
    private $totalPages;
    private $currentPage;
    private $startData;
    private $condition;
    private $joinTables;

    public function __construct($database, $table, $perPage, $currentPage, $condition = "", $joinTables = null) {
        $this->conn = $database->getConnection();
        $this->table = $table;
        $this->perPage = $perPage;
        $this->condition = $condition;
        $this->joinTables = $joinTables;

        $conditionQuery = "";
        if (!empty($condition)) {
            $conditionQuery = "WHERE " . $condition;
        }

        $this->totalData = count($this->conn->query("SELECT * FROM {$table} {$conditionQuery}")->fetch_all(MYSQLI_ASSOC));
        $this->totalPages = ceil($this->totalData / $perPage);
        $this->currentPage =  $currentPage;
        $this->startData = ($this->perPage * $this->currentPage) - $this->perPage;
    }

    public function getStartData() {
        return $this->startData;
    }

    public function getPerPage() {
        return $this->perPage;
    }

    public function getTotalPages() {
        return $this->totalPages;
    }

    public function getTotalData() {
        return $this->totalData;
    }

    public function getCurrentPage() {
        return $this->currentPage;
    }

    public function getPaginatedData() {
        $conditionQuery = "";
        if (!empty($this->condition)) {
            $conditionQuery = "WHERE " . $this->condition;
        }

        $joinQuery = "";
        if (!empty($this->joinTables)) {
            $joinQuery = implode(' ', $this->joinTables);
        }

        $query = $this->conn->query("SELECT * FROM {$this->table} {$joinQuery} {$conditionQuery} LIMIT {$this->startData}, {$this->perPage}");
        $result = [];

        while ($row = $query->fetch_assoc()) {
            $result[] = $row;
        }

        return $result;
    }

}

?>