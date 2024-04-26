<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        $utils = new Utils();
        $utils->notLogin();
    }

    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
        $data['siswa'] = $this->model('Siswa_model')->countAll()['total'];
        $data['guru'] = $this->model('Guru_model')->countAll()['total'];
        $data['waliMurid'] = $this->model('WaliMurid_model')->countAll()['total'];
        $data['admin'] = $this->model('Admin_model')->countAll()['total'];
        $data['kriteria'] = $this->model('Kriteria_model')->countAll()['total'];

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
