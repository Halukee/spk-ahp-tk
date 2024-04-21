<?php

class WaliMurid extends Controller
{
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/waliMurid', 'label' => 'Wali Murid'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
        ob_start();
        include_once $this->view('app/waliMurid/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Wali Murid');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/waliMurid/index.js"></script>
        ');

        $template->display($this->view('layouts/app'));
    }

    public function create()
    {
        $action = BASEURL . '/waliMurid/store/';
        $data['action'] = $action;
        ob_start();
        include_once $this->view('app/waliMurid/form', $data);
        $content = ob_get_clean();
        echo $content;
    }
}
