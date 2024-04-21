<?php

class Guru extends Controller
{
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/Guru', 'label' => 'Guru'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
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
        $action = BASEURL . '/Guru/store/';
        $data['action'] = $action;
        ob_start();
        include_once $this->view('app/guru/form', $data);
        $content = ob_get_clean();
        echo $content;
    }
}
