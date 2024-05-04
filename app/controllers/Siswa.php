<?php

class Siswa extends Controller
{
    public function __construct()
    {
        $utils = new Utils();
        $utils->notLogin();
    }


    public function dataTables()
    {
        $siswaModel = $this->model('Siswa_model');
        $dataAll = $siswaModel->getAll();
        $dataCount = count($dataAll);
        $data = array();
        foreach ($dataAll as $key => $value) {
            $buttonEdit = '
        <a href="' . BASEURL . '/Siswa/edit/' . $value['id'] . '" class="btn btn-warning btn-edit btn-sm">
            <i class="fa-solid fa-pencil"></i>
        </a>';
            $buttonDelete = '
        <a href="' . BASEURL . '/Siswa/delete/' . $value['id'] . '" class="btn btn-danger btn-delete btn-sm">
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
            ['url' => BASEURL . '/Siswa', 'label' => 'Siswa'],
        ];
        $siswaModel = $this->model('Siswa_model');


        $data['breadcrumbs'] = $breadcrumbItems;
        $data['data'] = $siswaModel->getAll();
        ob_start();
        include_once $this->view('app/siswa/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Siswa');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/siswa/index.js"></script>
        ');



        $template->display($this->view('layouts/app'));
    }

    public function create()
    {
        $siswaModel = $this->model('Siswa_model');

        $action = BASEURL . '/Siswa/store/';
        $data['action'] = $action;
        $data['kode_profile'] = $siswaModel->getKode();

        ob_start();
        include_once $this->view('app/siswa/form', $data);
        $content = ob_get_clean();
        echo $content;
    }

    public function edit($id)
    {
        $action = BASEURL . '/Siswa/update/' . $id;
        $siswaModel = $this->model('Siswa_model');

        $data['action'] = $action;
        $data['row'] = $siswaModel->getById($id);
        $data['kode_profile'] = $siswaModel->getKode();

        ob_start();
        include_once $this->view('app/siswa/form', $data);
        $content = ob_get_clean();
        echo $content;
    }

    public function store()
    {
        try {
            $data = $_POST;
            $siswaModel = $this->model('Siswa_model');
            $siswaModel->create($data);
            echo json_encode('Berhasil menambahkan siswa');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function update($id)
    {
        try {
            $data = $_POST;
            $siswaModel = $this->model('Siswa_model');
            $siswaModel->update($data, $id);
            echo json_encode('Berhasil mengubah siswa');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $siswaModel = $this->model('Siswa_model');
            $siswaModel->delete($id);
            echo json_encode('Berhasil delete siswa');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
}
