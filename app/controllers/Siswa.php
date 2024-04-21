<?php

class Siswa extends Controller
{
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/Siswa', 'label' => 'Siswa'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
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
        $action = BASEURL . '/Siswa/store/';
        $data['action'] = $action;
        ob_start();
        include_once $this->view('app/siswa/form', $data);
        $content = ob_get_clean();
        echo $content;
    }
}
