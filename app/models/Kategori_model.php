<?php
class Kategori_model {
    private $table = 'kategori';
    private $db;
    private $auth;
    private $crud;
    private $paginate;

    public function __construct($page) {
        $this->db = new Database;
        $this->crud = new Crud($this->db);
        $this->paginate = new Pagination($this->db, $this->table, 10, $page);
    }

    public function createData($data) {
        return $this->crud->createData($this->table, $data);
    }
    
    public function readData() {
        return $this->crud->readData($this->table);
    }

    public function readDataOne($id) {
        return $this->crud->readDataOne($this->table, "id= '$id' ");
    }

    public function updateData($data) {
        return $this->crud->updateData($this->table, $data, "id= '$data[id]' ");
    }

    public function deleteData($data) {
        return $this->crud->deleteData($this->table, "id= '$data[id_del]' ");
    }

    public function deleteSelected($data){
        return $result = $this->crud->deleteSelected($this->table, $data["id_kategori"]);
    }

    public function getStartData(){
        return $this->paginate->getStartData();
    }
    public function getPerPage(){
        return $this->paginate->getPerPage();
    }
    public function getTotalPages(){
        return $this->paginate->getTotalPages();
    }
    public function getTotalData(){
        return $this->paginate->getTotalData();
    }
    public function getCurrentPage(){
        return $this->paginate->getCurrentPage();
    }
    public function getPaginatedData(){
        return $this->paginate->getPaginatedData();
    }

    public function searchData($keyword) 
    {
        $condition = "kategori LIKE '%$keyword%'";
        return $this->crud->readData("kategori", $condition);
    }

}
?> 