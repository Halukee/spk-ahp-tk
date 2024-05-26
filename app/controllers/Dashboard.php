<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        $utils = new Utils();
        $utils->notLogin();

        $allowMyProfile = ['Admin', 'Guru'];
        $utils = new Utils();
        $myProfile = $utils->myProfile();
        if (!in_array($myProfile['nama_roles'], $allowMyProfile)) {
            header("Location: " . BASEURL . '/Page403');
            exit;
        }
    }

    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
        ];

        $sessionHasilAkhir = isset($_SESSION['hasil_akhir']['ranking']) ? count($_SESSION['hasil_akhir']['ranking']) : 0;
        $dataHasilAkhir = $this->model('HasilAkhir_model')->getHasilAkhir();

        $data['breadcrumbs'] = $breadcrumbItems;
        $data['siswa'] = $this->model('Siswa_model')->countAll()['total'];
        $data['guru'] = $this->model('Guru_model')->countAll()['total'];
        $data['waliMurid'] = $this->model('WaliMurid_model')->countAll()['total'];
        $data['admin'] = $this->model('Admin_model')->countAll()['total'];
        $data['kriteria'] = $this->model('Kriteria_model')->countAll()['total'];
        $data['nilai'] = $this->model('Nilai_model')->countAll()['total'];
        $data['absensi'] = $this->model('Absensi_model')->countAll()['total'];
        $data['hasil_akhir'] = $dataHasilAkhir != null ? count(json_decode($dataHasilAkhir, true)['ranking']) : $sessionHasilAkhir;

        ob_start();
        include_once $this->view('app/dashboard/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Dashboard');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/dashboard/index.js"></script>');



        $template->display($this->view('layouts/app'));
    }
}
