<?php

class Guru extends Controller
{
    public function dataTables()
    {
        $guruModel = $this->model('Guru_model');
        $dataAll = $guruModel->getAll();
        $dataCount = count($dataAll);
        $data = array();
        foreach ($dataAll as $key => $value) {
            $buttonEdit = '
        <a href="' . BASEURL . '/Guru/edit/' . $value['id'] . '" class="btn btn-warning btn-edit btn-sm">
            <i class="fa-solid fa-pencil"></i>
        </a>';
            $buttonDelete = '
        <a href="' . BASEURL . '/Guru/delete/' . $value['id'] . '" class="btn btn-danger btn-delete btn-sm">
            <i class="fa-solid fa-trash"></i>
        </a>';
            $buttonAction = '
            <div class="text-center">
                ' . $buttonEdit . ' ' . $buttonDelete . '
            </div>';
            $data[] = [
                'nama_profile' => $value['nama_profile'],
                'alamat_profile' => $value['alamat_profile'],
                'jeniskelamin_profile' => $value['jeniskelamin_profile'] == 'L' ? 'Laki-laki' : "Perempuan",
                'nomorhp_profile' => $value['nomorhp_profile'],
                'action' => $buttonAction,
            ];
        }

        $totalRecords = $dataCount;
        $recordsFiltered = $dataCount;
        $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 0;
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data,
        );

        echo json_encode($response);
    }
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/Guru', 'label' => 'Guru'],
        ];
        $guruModel = $this->model('Guru_model');


        $data['breadcrumbs'] = $breadcrumbItems;
        $data['data'] = $guruModel->getAll();
        ob_start();
        include_once $this->view('app/guru/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Guru');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/guru/index.js"></script>
        ');



        $template->display($this->view('layouts/app'));
    }

    public function create()
    {
        $guruModel = $this->model('Guru_model');

        $action = BASEURL . '/Guru/store/';
        $data['action'] = $action;

        ob_start();
        include_once $this->view('app/guru/form', $data);
        $content = ob_get_clean();
        echo $content;
    }

    public function edit($id)
    {
        $action = BASEURL . '/Guru/update/' . $id;
        $guruModel = $this->model('Guru_model');

        $data['action'] = $action;
        $data['row'] = $guruModel->getById($id);
        ob_start();
        include_once $this->view('app/guru/form', $data);
        $content = ob_get_clean();
        echo $content;
    }

    public function store()
    {
        try {
            $data = $_POST;
            $guruModel = $this->model('Guru_model');
            $guruModel->create($data);
            echo json_encode('Berhasil menambahkan guru');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function update($id)
    {
        try {
            $data = $_POST;
            $guruModel = $this->model('Guru_model');
            $guruModel->update($data, $id);
            echo json_encode('Berhasil mengubah guru');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $guruModel = $this->model('Guru_model');
            $guruModel->delete($id);
            echo json_encode('Berhasil delete guru');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
}
