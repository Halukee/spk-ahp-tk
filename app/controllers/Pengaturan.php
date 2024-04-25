<?php

class Pengaturan extends Controller
{
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/Pengaturan', 'label' => 'Pengaturan'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
        ob_start();
        include_once $this->view('app/pengaturan/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Pengaturan');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/pengaturan/index.js"></script>
        ');

        $template->display($this->view('layouts/app'));
    }

    public function create()
    {
        $action = BASEURL . '/pengaturan/store/';
        $data['action'] = $action;
        ob_start();
        include_once $this->view('app/pengaturan/form', $data);
        $content = ob_get_clean();
        echo $content;
    }

    public function store()
    {
        try {
            $data = $_POST;
            $gambar_pengaturan = Utils::uploadFile('gambar_pengaturan', 'uploads/pengaturan/');
            $data['gambar_pengaturan'] = $gambar_pengaturan;

            $pengaturanModel = $this->model('Pengaturan_model');
            $pengaturanModel->create($data);
            echo json_encode('Berhasil setting aplikasi');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
}
