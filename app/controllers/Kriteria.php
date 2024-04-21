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

        $data['breadcrumbs'] = $breadcrumbItems;
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
}
