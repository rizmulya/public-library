<?php
class Home_model {
    private $table = 'buku';
    private $db;
    private $crud;
    private $paginate;
    // private $join;
    // private $joinCond;
    // private $math;

    public function __construct($page) {
        $this->db = new Database;
        $this->crud = new Crud($this->db);
        $this->paginate = new Pagination($this->db, $this->table, 9, $page);
        // $this->join = new joinTables($this->db);
        // $this->math = new Math($this->db);
    }

    public function createData($data) {
        if($data['qty'] <= 0) return false;
        return $this->crud->createData("cart", $data);
    }

    // public function createDataWithImage($data) {
    //     return $this->crud->createDataWithImage($this->table, $data, "gambar", "gambar", "img/books/");
    // }
    
    // public function readData() {
    //     return $this->crud->readData($this->table);
    // }

    // public function readDataOne($id) {
    //     return $this->crud->readDataOne($this->table, "id= '$id' ");
    // }

    // public function updateData($data) {
    //     return $this->crud->updateData($this->table, $data, "id= '$data[id]' ");
    // }

    // public function updateDataWithImage($data, $id) {
    //     return $this->crud->updateDataWithImage($this->table, $data, "id= '$id' ", "gambar", "gambar", "img/books/");
    // }

    // public function deleteData($data) {
    //     return $this->crud->deleteData($this->table, "id= '$data[id_del]' ");
    // }

    // public function deleteSelected($data){
    //     return $result = $this->crud->deleteSelected($this->table, $data["id_buku"]);
    // }

    // public function join(){
    //     return $result = $this->join->join(['buku', 'kategori'], ["buku.id_kategori = kategori.id"], "kategori");
    // }

    // public function totalColumn($column){
    //     return $result = $this->math->totalColumn($this->table, $column);
    // }

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
        $condition = "judul LIKE '%$keyword%'
                    OR kategori LIKE '%$keyword%'
                    OR kode_buku LIKE '%$keyword%'
                    OR stok LIKE '%$keyword%'
                    OR detail LIKE '%$keyword%'";
                    return $this->join->join(['buku', 'kategori'], ["buku.id_kategori = kategori.id"], "*", $condition);
    }

    // public function searchDataOne($keyword) 
    // {
    //     $condition = "buku.id = '$keyword'";
    //                 return $this->join->join(['buku', 'kategori'], ["buku.id_kategori = kategori.id"], "*", $condition);
    // }
}
?>