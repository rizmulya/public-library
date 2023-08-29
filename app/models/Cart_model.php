<?php
class Cart_model {
    private $table = 'cart';
    private $db;
    private $auth;
    private $crud;
    private $paginate;
    private $join;
    private $joinCond;

    public function __construct($page, $condition = "") {
        $this->db = new Database;
        $this->crud = new Crud($this->db);
        $this->join = new joinTables($this->db);

        $joinQuery = [
            "JOIN users ON cart.id_users = users.id",
            "JOIN buku ON cart.id_buku = buku.id"
        ];
        $this->paginate = new Pagination($this->db, $this->table, 10, $page, $condition, $joinQuery);
    }

    public function createDataWithImage($data) {
        return $this->crud->createDataWithImage($this->table, $data, "gambar", "gambar", "img/books/");
    }
    
    public function readId() {
        return $this->crud->readData($this->table, "id");
    }

    public function readDataOne($id) {
        return $this->crud->readDataOne($this->table, "id_cart= '$id' ");
    }

    public function updateData($data) {
        return $this->crud->updateData($this->table, $data, "id_cart= '$data[id]' ");
    }

    public function updateDataWithImage($data, $id) {
        return $this->crud->updateDataWithImage($this->table, $data, "id_cart= '$id' ", "gambar", "gambar", "img/books/");
    }

    public function deleteData($data) {
        return $this->crud->deleteData($this->table, "id_cart= '$data[id_del]' ");
    }

    public function deleteSelected($data){
        return $result = $this->crud->deleteSelected($this->table, $data["id_buku"]);
    }

    public function join($id){
        $select_columns = "buku.gambar, buku.judul, buku.kode_buku"; 
        return $result = $this->join->join(['cart', 'users', 'buku'], ["cart.id_users = users.id", "cart.id_buku = buku.id"], $select_columns, "id_users= '$id' ");
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

    public function searchData($keyword, $id = "") 
    {
        $condition = "id_users = '$id'
                    AND (judul LIKE '%$keyword%'
                        OR kode_buku LIKE '%$keyword%'
                        OR qty LIKE '%$keyword%')";
        $select_columns = "cart.*, buku.judul, buku.kode_buku, buku.gambar"; 
        
        return $this->join->join(['cart', 'buku'], ["cart.id_buku = buku.id"], $select_columns, $condition);
    }
    

    public function searchDataOne($keyword) 
    {
        $condition = "buku.id = '$keyword'";
                    return $this->join->join(['buku', 'kategori'], ["buku.id_kategori = kategori.id"], "*", $condition);
    }
}
?>