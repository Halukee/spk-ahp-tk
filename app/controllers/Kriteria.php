<?php

class Kriteria extends Controller
{
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/Kriteria', 'label' => 'Kriteria'],
        ];
        $kriteriaModel = $this->model('Kriteria_model');


        $data['breadcrumbs'] = $breadcrumbItems;
        $data['data'] = $kriteriaModel->getAll();
        ob_start();
        include_once $this->view('app/kriteria/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Kriteria');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/kriteria/index.js"></script>
        ');



        $template->display($this->view('layouts/app'));
    }

    public function create()
    {
        $action = BASEURL . '/Kriteria/store/';
        $data['action'] = $action;
        ob_start();
        include_once $this->view('app/kriteria/form', $data);
        $content = ob_get_clean();
        echo $content;
    }

    public function edit($id)
    {
        $action = BASEURL . '/Kriteria/update/' . $id;
        $kriteriaModel = $this->model('Kriteria_model');

        $data['action'] = $action;
        $data['row'] = $kriteriaModel->getById($id);
        ob_start();
        include_once $this->view('app/kriteria/form', $data);
        $content = ob_get_clean();
        echo $content;
    }

    public function store()
    {
        try {
            $data = $_POST;
            $kriteriaModel = $this->model('Kriteria_model');
            $kriteriaModel->create($data);
            echo json_encode('Berhasil menambahkan kriteria');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function generateKode()
    {
        $kriteriaModel = $this->model('Kriteria_model');
        $getKode = $kriteriaModel->getKode();
        echo json_encode($getKode);
    }
}
