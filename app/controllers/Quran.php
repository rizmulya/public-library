<?php
class Quran extends Controller {
    public function index(){
        $data = [
            'title'=> 'Quran',
        ];
        $this->view('front/templates/header', $data);
        $this->view('front/quran/index', $data);
        $this->view('front/templates/footer');
    }
}
?>