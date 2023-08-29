<?php
class Home extends Controller {
    public function index($page = 1){
        $homeModel = $this->model('Home_model', $page);
        $paginatedData = $homeModel->getPaginatedData();

        $data = [
            'title' => 'library',
            'pagination' => [
                'paginatedData' => $paginatedData,
            ],
        ];
        $this->view('front/templates/header', $data);
        $this->view('front/home/index', $data);
        $this->view('front/templates/footer');
    }

    public function physical($page = 1, $keyword = null){
        // $sessionKey = Utils::justValidate();

        $homeModel = $this->model('Home_model', $page);
        // pagination based on search
        $keyword = (isset($_POST['search']) ? $_POST['search'] : null);
        if($keyword !== null){
            $paginatedData = $homeModel->searchData($keyword) ? 
                            $homeModel->searchData($keyword) : // fix false given
                            $homeModel->getPaginatedData();
        } else {
            $paginatedData = $homeModel->getPaginatedData();
        }
    
        $data = [
            'title' => 'physical books',
            'pagination' => [
                'startData' => $homeModel->getStartData(),
                'perPage' => $homeModel->getPerPage(),
                'totalPages' => $homeModel->getTotalPages(),
                'totalData' => $homeModel->getTotalData(),
                'currentPage' => $homeModel->getCurrentPage(),
                'paginatedData' => $paginatedData,
            ],
        ];
        // disvisible button if not paginated
        if($keyword !== null){
            $data['pagination']['currentPage'] = 0;
            $data['pagination']['totalPages'] = 0;
        }
        
        $this->view('front/templates/header', $data);
        $this->view('front/home/physical', $data);
        $this->view('front/templates/footer');
    }

    public function physical_json(){
        Utils::isPost("/home/physical");

        $buku = $this->model('Buku_model')->searchDataOne($_POST['id']);
        $bukuId = $this->model('Buku_model')->readDataOne($_POST['id']);
        $combinedData = [
            'buku' => $buku,
            'buku-id' => $bukuId,
        ];

        echo json_encode($combinedData);
    }

    public function physical_borrow_json(){
        $sessionKey = Utils::justValidate();
        Utils::isPost("/home/physical");

        $buku = $this->model('Buku_model')->searchDataOne($_POST['id']);
        $bukuId = $this->model('Buku_model')->readDataOne($_POST['id']);

        $combinedData = [
            'buku' => $buku,
            'buku-id' => $bukuId,
            'users' => $this->model('Users_model')->readDataOne($_SESSION[$sessionKey]),
        ];

        echo json_encode($combinedData);
    }

    public function borrow(){
        $sessionKey = Utils::justValidate();
        Utils::isPost("/home/physical");

        if($this->model('Home_model')->createData($_POST)){
            Flasher::setFlash('', '✅ berhasil menambahkan ke keranjang', 'green-500', 'green-700');
            header('Location: '. BASEURL .'/borrow/cart');
            exit();
        } else {
            Flasher::setFlash('', '⛔ masukan qty buku dengan benar', 'red-400', 'red-600');
            header('Location: '. BASEURL .'/borrow/cart');
            exit();
        }
    }
}
?>