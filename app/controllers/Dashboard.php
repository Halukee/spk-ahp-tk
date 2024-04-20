<?php

class Dashboard extends Controller
{
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
        ob_start();
        include_once $this->view('app/dashboard/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Dashboard');
        $template->assign('content', $content);
        $template->assign('custom_js', '<script src="' . BASEURL . '/public/js/app/dashboard/index.js"></script>');



        $template->display($this->view('layouts/app'));
    }
}
