<?php
class Borrow extends Controller {
    public function index(){
        $sessionKey = Utils::justValidate();

        $UsersModel = $this->model('Users_model');
        $bukuModel = $this->model('Buku_model');
        $data = [
            'title' => 'dashboard',
            'whoami' => $UsersModel->readDataOne($_SESSION[$sessionKey]),
            'totalBuku' => count($this->model('Buku_model')->readData()),
            'totalKategori' => count($this->model('Kategori_model')->readData()),
            'totalUsers' => count($UsersModel->readData()),
            'totalStok' => $bukuModel->totalColumn("stok"),
        ];
        $this->view('back/templates/header', $data);
        $this->view('back/templates/navbar', $data);
        $this->view('back/templates/sidebar');
        $this->view('back/dashboard/index', $data);
        $this->view('back/templates/footer');
    }

// ADMIN
    public function buku($page = 1, $keyword = null){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);

        $bukuModel = $this->model('Buku_model', $page);
        // pagination based on search
        $keyword = (isset($_POST['search']) ? $_POST['search'] : null);
        if($keyword !== null){
            $paginatedData = $bukuModel->searchData($keyword) ? 
                            $bukuModel->searchData($keyword) : // fix false given
                            $bukuModel->getPaginatedData();
        } else {
            $paginatedData = $bukuModel->getPaginatedData();
        }
       
        $data = [
            'title' => 'buku',
            'whoami' => $this->model('Users_model')->readDataOne($_SESSION[$sessionKey]),
            'allkategori' => $this->model('Kategori_model')->readData(),
            'kategori' => $bukuModel->join(),
            'pagination' => [
                'startData' => $bukuModel->getStartData(),
                'perPage' => $bukuModel->getPerPage(),
                'totalPages' => $bukuModel->getTotalPages(),
                'totalData' => $bukuModel->getTotalData(),
                'currentPage' => $bukuModel->getCurrentPage(),
                'paginatedData' => $paginatedData,
            ],
        ];
        // disvisible button if not paginated
        if($keyword !== null){
            $data['pagination']['currentPage'] = 0;
            $data['pagination']['totalPages'] = 0;
        }
        
        $this->view('back/templates/header', $data);
        $this->view('back/templates/navbar', $data);
        $this->view('back/templates/sidebar');
        $this->view('back/dashboard/buku/buku', $data);
        $this->view('back/templates/footer');
    }

    public function buku_add(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/buku");

        if($this->model('Buku_model')->createDataWithImage($_POST)){
            Flasher::setFlash('', '✅ data berhasil ditambahkan', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/buku');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal ditambahkan', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/buku');
            exit();
        }
    }

    public function buku_dels(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/buku");

        $result = $this->model('Buku_model')->deleteSelected($_POST);
        if($result){
            Flasher::setFlash('', '✅ data berhasil dihapus', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/buku');
            exit();
        } else {
            Flasher::setFlash('', '⛔ pilih data untuk dihapus', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/buku');
            exit();
        }
    }


    public function kategori($page = 1, $keyword = null){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);

        $kategoriModel = $this->model('Kategori_model', $page);

        // pagination based on search
        $keyword = (isset($_POST['search']) ? $_POST['search'] : null);
        if($keyword !== null){
            $paginatedData = $kategoriModel->searchData($keyword) ? 
                            $kategoriModel->searchData($keyword) : // fix false given
                            $kategoriModel->getPaginatedData();
        } else {
            $paginatedData = $kategoriModel->getPaginatedData();
        }
       
        $data = [
            'title' => 'kategori',
            'whoami' => $this->model('Users_model')->readDataOne($_SESSION[$sessionKey]),
            'kategori' => $kategoriModel->readData(),
            'pagination' => [
                'startData' => $kategoriModel->getStartData(),
                'perPage' => $kategoriModel->getPerPage(),
                'totalPages' => $kategoriModel->getTotalPages(),
                'totalData' => $kategoriModel->getTotalData(),
                'currentPage' => $kategoriModel->getCurrentPage(),
                'paginatedData' => $paginatedData,
            ],
        ];
        // disvisible button if not paginated
        if($keyword !== null){
            $data['pagination']['currentPage'] = 0;
            $data['pagination']['totalPages'] = 0;
        }
        
        $this->view('back/templates/header', $data);
        $this->view('back/templates/navbar', $data);
        $this->view('back/templates/sidebar');
        $this->view('back/dashboard/kategori', $data);
        $this->view('back/templates/footer');
    }
    

    public function kategori_add(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/kategori");

        if($this->model('Kategori_model')->createData($_POST)){
            Flasher::setFlash('', '✅ data berhasil ditambahkan', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/kategori');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal ditambahkan', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/kategori');
            exit();
        }
    }

    public function kategori_json(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/kategori");

        echo json_encode($this->model('Kategori_model')->readDataOne($_POST['id']));
    }

    public function users_json(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/users");

        echo json_encode($this->model('Users_model')->readDataOne($_POST['id']));
    }

    public function buku_json(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/buku");

        $buku = $this->model('Buku_model')->searchDataOne($_POST['id']);
        $bukuId = $this->model('Buku_model')->readDataOne($_POST['id']);
        $combinedData = [
            'buku' => $buku,
            'buku-id' => $bukuId
        ];

        echo json_encode($combinedData);
    }

    public function kategori_edit(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/kategori");

        if($this->model('Kategori_model')->updateData($_POST)){
            Flasher::setFlash('', '✅ data berhasil diedit', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/kategori');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal diedit', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/kategori');
            exit();
        }
    }

    public function buku_edit(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/buku");

        $id = $_POST['id'];
        $data = [
            'judul' => $_POST['judul'],
            'id_kategori' => $_POST['id_kategori'],
            'kode_buku' => $_POST['kode_buku'],
            'stok' => $_POST['stok'],
            'detail' => $_POST['detail'],
        ];
        // var_dump($id, $data); die();
        $result = $this->model('Buku_model')->updateDataWithImage($data, $id);
        if($result){
            Flasher::setFlash('', '✅ data berhasil diedit', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/buku');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal diedit', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/buku');
            exit();
        }
    }

    public function kategori_del(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/kategori");

        if($this->model('Kategori_model')->deleteData($_POST)){
            Flasher::setFlash('', '✅ data berhasil dihapus', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/kategori');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal dihapus', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/kategori');
            exit();
        }
    }

    public function buku_del(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/buku");

        if($this->model('Buku_model')->deleteDataWithImage($_POST)){
            Flasher::setFlash('', '✅ data berhasil dihapus', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/buku');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal dihapus', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/buku');
            exit();
        }
    }

    public function users_del(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/users");

        if($this->model('Users_model')->deleteData($_POST)){
            Flasher::setFlash('', '✅ data berhasil dihapus', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/users');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal dihapus', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/users');
            exit();
        }
    }

    public function kategori_dels(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/kategori");

        $result = $this->model('Kategori_model')->deleteSelected($_POST);
        if($result){
            Flasher::setFlash('', '✅ data berhasil dihapus', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/kategori');
            exit();
        } else {
            Flasher::setFlash('', '⛔ pilih data untuk dihapus', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/kategori');
            exit();
        }
    }

    public function users($page = 1, $keyword = null){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);

        $UsersModel = $this->model('Users_model', $page);

        // pagination based on search
        $keyword = (isset($_POST['search']) ? $_POST['search'] : null);
        if($keyword !== null){
            $paginatedData = $UsersModel->searchData($keyword) ? 
                            $UsersModel->searchData($keyword) : // fix false given
                            $UsersModel->getPaginatedData();
        } else {
            $paginatedData = $UsersModel->getPaginatedData();
        }
       
        $data = [
            'title' => 'users',
            'whoami' => $UsersModel->readDataOne($_SESSION[$sessionKey]),
            'users' => $UsersModel->readData(),
            'pagination' => [
                'startData' => $UsersModel->getStartData(),
                'perPage' => $UsersModel->getPerPage(),
                'totalPages' => $UsersModel->getTotalPages(),
                'totalData' => $UsersModel->getTotalData(),
                'currentPage' => $UsersModel->getCurrentPage(),
                'paginatedData' => $paginatedData,
            ],
        ];
        // disvisible button if not paginated
        if($keyword !== null){
            $data['pagination']['currentPage'] = 0;
            $data['pagination']['totalPages'] = 0;
        }
        
        $this->view('back/templates/header', $data);
        $this->view('back/templates/navbar', $data);
        $this->view('back/templates/sidebar');
        $this->view('back/dashboard/users', $data);
        $this->view('back/templates/footer');
    }

    public function users_add(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/users");

        if($this->model('Users_model')->createData($_POST)){
            Flasher::setFlash('', '✅ data berhasil ditambahkan', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/users');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal ditambahkan', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/users');
            exit();
        }
    }

    public function users_edit(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/users");
        // var_dump($_POST['id']); die();

        if($this->model('Users_model')->updateData($_POST)){
            Flasher::setFlash('', '✅ data berhasil diedit', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/users');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal diedit', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/users');
            exit();
        }
    }

    public function users_dels(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/users");

        if($this->model('Users_model')->deleteSelected($_POST)){
            Flasher::setFlash('', '✅ data berhasil dihapus', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/users');
            exit();
        } else {
            Flasher::setFlash('', '⛔ pilih data untuk dihapus', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/users');
            exit();
        }
    }

    public function borrowed($page = 1, $keyword = null){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);

        $checkoutModel = $this->model('Checkout_model', $page);
        // pagination based on search
        $keyword = (isset($_POST['search']) ? $_POST['search'] : null);
        if($keyword !== null){
            $paginatedData = $checkoutModel->searchData($keyword) ? 
                            $checkoutModel->searchData($keyword) : // fix false given
                            $checkoutModel->getPaginatedData();
        } else {
            $paginatedData = $checkoutModel->getPaginatedData();
        }
        // var_dump($paginatedData); die();
        
        $data = [
            'title' => 'status',
            'whoami' => $this->model('Users_model')->readDataOne($_SESSION[$sessionKey]),
            'join' => $checkoutModel->join(),
            'pagination' => [
                'startData' => $checkoutModel->getStartData(),
                'perPage' => $checkoutModel->getPerPage(),
                'totalPages' => $checkoutModel->getTotalPages(),
                'totalData' => $checkoutModel->getTotalData(),
                'currentPage' => $checkoutModel->getCurrentPage(),
                'paginatedData' => $paginatedData,
            ],
        ];
        // disvisible button if not paginated
        if($keyword !== null){
            $data['pagination']['currentPage'] = 0;
            $data['pagination']['totalPages'] = 0;
        }
        
        $this->view('back/templates/header', $data);
        $this->view('back/templates/navbar', $data);
        $this->view('back/templates/sidebar');
        $this->view('back/dashboard/borrowed/borrowed', $data);
        $this->view('back/templates/footer');
    }

    public function borrowed_json(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/borrowed");

        echo json_encode($this->model('Checkout_model')->readDataOne($_POST['id']));
    }

    public function borrowed_edit(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/borrowed");

        $checkoutModel =  $this->model('Checkout_model');
        $bukuModel = $this->model('Buku_model');
        $idCheckout = $_POST['id'];
        $statusPost = $_POST['status'];
        
        $currentStats = $checkoutModel->readDataOne($idCheckout)['status'];
        // var_dump($currentStats); die();
        if($currentStats != 'Terkonfirmasi' && $currentStats != 'Dikembalikan'){
            $checkoutModel->updateData(["status"=>$statusPost, "id_checkout"=>$idCheckout]);
    
            $result = true;
            if($statusPost == 'Konfirmasi'){
                $statuss = $checkoutModel->searchConfirm("Konfirmasi");
                foreach($statuss as $status){
                    $id = $status['id_buku'];
                    $qty = $status['qty'];
        
                    if($qty == 0) break;
                    $currentStock = $bukuModel->readDataOne($id)['stok'];
                    $newStock = $currentStock - $qty;
        
                    if($newStock < 0) break;
                    $setClause = "stok = ?, dipinjam = dipinjam + ?";
                    $condition = "id = ?";
                    $params = [$newStock, $qty, $id];
                    $checkoutModel->updateCustom("buku", $setClause, $condition, $params);
                    $checkoutModel->updateStatus(["status"=>"Terkonfirmasi"], "Konfirmasi");
                }
            }
        }
        if($currentStats == 'Terkonfirmasi'){
            $checkoutModel->updateData(["status"=>$statusPost, "id_checkout"=>$idCheckout]);

            $result = true;
            if($statusPost == 'Kembalikan'){
                $statuss = $checkoutModel->searchConfirm("Kembalikan");
                foreach($statuss as $status){
                    $id = $status['id_buku'];
                    $qty = $status['qty'];
        
                    if($qty == 0) break;
                    $currentStock = $bukuModel->readDataOne($id)['stok'];
                    $newStock = $currentStock + $qty;
        
                    $setClause = "stok = ?, dipinjam = dipinjam - ?";
                    $condition = "id = ?";
                    $params = [$newStock, $qty, $id];
                    $checkoutModel->updateCustom("buku", $setClause, $condition, $params);
                    $checkoutModel->updateStatus(["status"=>"Dikembalikan"], "Kembalikan");
                }
            }
        }

        if($result){
            Flasher::setFlash('', '✅ perubahan tersimpan', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/borrowed');
            exit();
        } else {
            Flasher::setFlash('', '⛔ peminjaman terkonfirmasi atau buku sudah dikembalikan', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/borrowed');
            exit();
        }
    }

    public function borrowed_del(){
        $isAdmin = true;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/borrowed");

        if($this->model('Checkout_model')->deleteCheckout($_POST)){
            Flasher::setFlash('', '✅ data berhasil dihapus', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/borrowed');
            exit();
        } else {
            Flasher::setFlash('', '⛔ pilih data untuk dihapus', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/borrowed');
            exit();
        }
    }

// USER
    public function cart($page = 1, $keyword = null){
        $sessionKey = Utils::justValidate();
        $whoami = $this->model('Users_model')->readDataOne($_SESSION[$sessionKey]);
        $id_users = $whoami['id'];

        $cartModel = $this->model('Cart_model', $page, "id_users= '$id_users' ");
        // pagination based on search
        $keyword = (isset($_POST['search']) ? $_POST['search'] : null);
        if($keyword !== null){
            $paginatedData = $cartModel->searchData($keyword, $id_users) ? 
                            $cartModel->searchData($keyword, $id_users) : // fix false given
                            $cartModel->getPaginatedData();
        } else {
            $paginatedData = $cartModel->getPaginatedData();
        }

        $data = [
            'title' => 'cart',
            'whoami' => $whoami,
            'pagination' => [
                'startData' => $cartModel->getStartData(),
                'perPage' => $cartModel->getPerPage(),
                'totalPages' => $cartModel->getTotalPages(),
                'totalData' => $cartModel->getTotalData(),
                'currentPage' => $cartModel->getCurrentPage(),
                'paginatedData' => $paginatedData,
            ],
        ];
        // disvisible button if not paginated
        if($keyword !== null){
            $data['pagination']['currentPage'] = 0;
            $data['pagination']['totalPages'] = 0;
        }
        
        $this->view('back/templates/header', $data);
        $this->view('back/templates/navbar', $data);
        $this->view('back/templates/sidebar');
        $this->view('back/dashboard/cart/cart', $data);
        $this->view('back/templates/footer');
    }

    public function cart_checkout(){
        $isAdmin = false;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/cart");

        $id_cart = (isset($_POST['id_cart']) ? $_POST['id_cart'] : '');
        $noref = $_POST['noref'];
        $tgl = $_POST['date'];
        $idBuku = $_POST['id_buku'];
        $idUsers = $_POST['id_users'];
        $qty = $_POST['qty'];
        $checkoutModel = $this->model('Checkout_model');
        $cartModel = $this->model('Cart_model');

        if($id_cart != ''){
            $success = true;
            for ($i = 0; $i < count($id_cart); $i++) {
                $data = [
                    'noref' => $noref,
                    'tgl' => $tgl,
                    'id_buku' => $cartModel->readDataOne($id_cart[$i])['id_buku'],
                    'id_users' => $idUsers[$i],
                    'qty' => $qty[$i],
                    'status' => "Menunggu Konfirmasi",
                ];
                // var_dump($data); 
                if(!$checkoutModel->createData($data)) {$success=false; break;}
                $checkoutModel->deleteData($id_cart[$i]);
            }
            // die();
        } 

        if($success){
            Flasher::setFlash('', '✅ berhasil checkout, silahkan menunggu konfirmasi', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/status');
            exit();
        } else {
            Flasher::setFlash('', '⛔ pilih buku untuk checkout', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/cart');
            exit();
        }
    }

    public function cart_json(){
        $isAdmin = false;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/cart");

        echo json_encode($this->model('Cart_model')->readDataOne($_POST['id']));
    }

    public function cart_del(){
        $isAdmin = false;
        $sessionKey = Utils::validate($isAdmin);
        Utils::isPost("/borrow/cart");

        if($this->model('Cart_model')->deleteData($_POST)){
            Flasher::setFlash('', '✅ data berhasil dihapus', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/cart');
            exit();
        } else {
            Flasher::setFlash('', '⛔ data gagal dihapus', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/cart');
            exit();
        }
    }

    public function status($page = 1, $keyword = null){
        $isAdmin = false;
        $sessionKey = Utils::validate($isAdmin);
        $whoami = $this->model('Users_model')->readDataOne($_SESSION[$sessionKey]);
        $id_users = $whoami['id'];

        $checkoutModel = $this->model('Checkout_model', $page, "id_users= '$id_users' ");
        // pagination based on search
        $keyword = (isset($_POST['search']) ? $_POST['search'] : null);
        if($keyword !== null){
            $paginatedData = $checkoutModel->searchData($keyword, $id_users) ? 
                            $checkoutModel->searchData($keyword, $id_users) : // fix false given
                            $checkoutModel->getPaginatedData();
        } else {
            $paginatedData = $checkoutModel->getPaginatedData();
        }
        
        $data = [
            'title' => 'status',
            'whoami' => $whoami,
            'pagination' => [
                'startData' => $checkoutModel->getStartData(),
                'perPage' => $checkoutModel->getPerPage(),
                'totalPages' => $checkoutModel->getTotalPages(),
                'totalData' => $checkoutModel->getTotalData(),
                'currentPage' => $checkoutModel->getCurrentPage(),
                'paginatedData' => $paginatedData,
            ],
        ];
        // disvisible button if not paginated
        if($keyword !== null){
            $data['pagination']['currentPage'] = 0;
            $data['pagination']['totalPages'] = 0;
        }
        
        $this->view('back/templates/header', $data);
        $this->view('back/templates/navbar', $data);
        $this->view('back/templates/sidebar');
        $this->view('back/dashboard/status/status', $data);
        $this->view('back/templates/footer');
    }

    public function print_status($page = 1, $keyword = null){
        $isAdmin = false;
        $sessionKey = Utils::validate($isAdmin);
        $whoami = $this->model('Users_model')->readDataOne($_SESSION[$sessionKey]);
        $id_users = $whoami['id'];

        $checkoutModel = $this->model('Checkout_model', $page, "id_users= '$id_users' ");
        // pagination based on search
        $keyword = (isset($_POST['search']) ? $_POST['search'] : null);
        if($keyword !== null){
            $paginatedData = $checkoutModel->searchData($keyword, $id_users) ? 
                            $checkoutModel->searchData($keyword, $id_users) : // fix false given
                            $checkoutModel->getPaginatedData();
        } else {
            $paginatedData = $checkoutModel->getPaginatedData();
        }
        
        $data = [
            'title' => 'status',
            'whoami' => $whoami,
            'pagination' => [
                'startData' => $checkoutModel->getStartData(),
                'perPage' => $checkoutModel->getPerPage(),
                'totalPages' => $checkoutModel->getTotalPages(),
                'totalData' => $checkoutModel->getTotalData(),
                'currentPage' => $checkoutModel->getCurrentPage(),
                'paginatedData' => $paginatedData,
            ],
        ];
        // disvisible button if not paginated
        if($keyword !== null){
            $data['pagination']['currentPage'] = 0;
            $data['pagination']['totalPages'] = 0;
        }
        
        $this->view('back/templates/header_print', $data);
        $this->view('back/dashboard/status/status_print', $data);
        $this->view('back/templates/footer');
    }

    public function logout(){
        $sessionKey = Utils::justValidate();

        if($this->model('Auth_model')->logout()){
            Flasher::setFlash('', '✅ berhasil logout', 'green-500', 'green-700');
            header('Location: '. BASEURL);
            exit();
        } else {
            Flasher::setFlash('', '⛔ gagal logout', 'red-400', 'red-600');
            header('Location: '. BASEURL);
            exit();
        }
    }

}

?>

