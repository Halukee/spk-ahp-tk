<?php

class Nilai extends Controller
{
    public function __construct()
    {
        $utils = new Utils();
        $utils->notLogin();

        $allowMyProfile = ['Guru', 'Wali Murid', 'Orang Tua'];
        $utils = new Utils();
        $myProfile = $utils->myProfile();
        if (!in_array($myProfile['nama_roles'], $allowMyProfile)) {
            header("Location: " . BASEURL . '/Page403');
            exit;
        }
    }


    public function dataTables()
    {
        $utils = new Utils();
        $myProfile = $utils->myProfile();

        $users_id_siswa = null;
        $namaRoles = $myProfile['nama_roles'];
        if ($namaRoles == 'Orang Tua') {
            $users_id_siswa = $myProfile['users_id_siswa'];
        }

        $siswaModel = $this->model('Siswa_model');
        $dataAll = $siswaModel->getAll($users_id_siswa);
        $dataCount = count($dataAll);
        $data = array();
        foreach ($dataAll as $key => $value) {
            $buttonEdit = '
        <a target="_blank" href="' . BASEURL . '/PenilaianSiswa?siswa_id=' . $value['id'] . '" class="btn btn-info btn-sm">
            <i class="fa-solid fa-pencil"></i>
        </a>';

            $buttonAction = '
            <div class="text-center">
                ' . $buttonEdit . '
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
            ['url' => BASEURL . '/Nilai', 'label' => 'Nilai Siswa'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
        ob_start();
        include_once $this->view('app/nilaiSiswa/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Nilai Siswa');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/nilaiSiswa/index.js"></script>
        ');

        $template->display($this->view('layouts/app'));
    }
}
