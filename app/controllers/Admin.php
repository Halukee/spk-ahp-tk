<?php

class Admin extends Controller
{
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/Admin', 'label' => 'Admin'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
        ob_start();
        include_once $this->view('app/admin/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Admin');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/admin/index.js"></script>
        ');

        $template->display($this->view('layouts/app'));
    }

    public function create()
    {
        $action = BASEURL . 'admin/store/';
        $data['action'] = $action;
        ob_start();
        include_once $this->view('app/admin/form', $data);
        $content = ob_get_clean();
        echo $content;
    }
}
