<?php
class Checkout_model {
    private $table = 'checkout';
    private $db;
    private $auth;
    private $crud;
    private $paginate;
    private $join;
    private $joinCond;

    public function __construct($page,$condition = "") {
        $this->db = new Database;
        $this->crud = new Crud($this->db);
        $this->join = new joinTables($this->db);

        $joinQuery = [
            "JOIN users ON checkout.id_users = users.id",
            "JOIN buku ON checkout.id_buku = buku.id"
        ];
        $this->paginate = new Pagination($this->db, $this->table, 10, $page, $condition, $joinQuery);
    }

    public function createData($data) {
        return $this->crud->createData($this->table, $data);
    }

    public function createDataWithImage($data) {
        return $this->crud->createDataWithImage($this->table, $data, "gambar", "gambar", "img/books/");
    }
    
    public function readData() {
        return $this->crud->readData($this->table);
    }

    public function readDataOne($id) {
        return $this->crud->readDataOne($this->table, "id_checkout= '$id' ");
    }

    public function updateData($data) {
        return $this->crud->updateData($this->table, $data, "id_checkout= '$data[id_checkout]' ");
    }

    public function updateStatus($data, $status) {
        return $this->crud->updateData($this->table, $data, "status= '$status' ");
    }

    public function updateCustom($table, $setClause, $condition, $params) {
        return $this->crud->updateCustom($table, $setClause, $condition, $params);
    }

    public function updateDataWithImage($data, $id) {
        return $this->crud->updateDataWithImage($this->table, $data, "id_checkout= '$id' ", "gambar", "gambar", "img/books/");
    }

    public function deleteData($id) {
        return $this->crud->deleteData("cart", "id_cart='$id'");
    }

    public function deleteCheckout($data) { //
        return $this->crud->deleteData($this->table, "id_checkout='$data[id_del]'");
    }

    public function deleteSelected($id){
        return $this->crud->deleteSelected("cart", "id_cart='$id'");
    }

    public function join(){ //
        return $this->join->join(['checkout', 'buku', 'users'], ["checkout.id_buku = buku.id", "checkout.id_users = users.id"], "*");
    }

    // public function joinUsers(){
    //     return $this->join->join(['checkout', 'users'], ["checkout.id_users = users.id"], "*");
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

    public function searchData($keyword, $id = "") 
    {
        $condition = "id_users = '$id'
                    AND (judul LIKE '%$keyword%'
                        OR nama LIKE '%$keyword%'
                        OR noref LIKE '%$keyword%'
                        OR status LIKE '%$keyword%'
                        OR tgl LIKE '%$keyword%')";
        // $select_columns = "cart.*, buku.judul, buku.kode_buku, buku.gambar"; 
        
        return $this->join->join(['checkout', 'buku', 'users'], ["checkout.id_buku = buku.id", "checkout.id_users = users.id"], "*", $condition);
    }

    public function searchDataNot($keyword) 
    {
        $condition = "judul LIKE '%$keyword%'
                    OR kode_buku LIKE '%$keyword%'
                    OR noref LIKE '%$keyword%'
                    OR status NOT LIKE '%$keyword%'
                    OR tgl LIKE '%$keyword%'";
                    return $this->join->join(['checkout', 'buku'], ["checkout.id_buku = buku.id"], "*", $condition);
    }

    public function searchDataOne($keyword) 
    {
        $condition = "buku.id = '$keyword'";
                    return $this->join->join(['checkout', 'buku'], ["checkout.id_buku = buku.id"], "*", $condition);
    }

    public function searchConfirm($keyword) 
    {
        $condition = "status = '$keyword'";
                    return $this->join->join(['checkout', 'buku'], ["checkout.id_buku = buku.id"], "*", $condition);
    }
}
?>