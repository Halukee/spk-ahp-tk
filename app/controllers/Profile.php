<?php

class Profile extends Controller
{
    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/Profile', 'label' => 'My Profile'],
        ];

        $data['breadcrumbs'] = $breadcrumbItems;
        ob_start();
        include_once $this->view('app/myProfile/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman My Profile');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/myProfile/index.js"></script>
        ');

        $template->display($this->view('layouts/app'));
    }

    public function edit($id)
    {
        $action = BASEURL . '/Profile/update/' . $id;
        $data['action'] = $action;
        ob_start();
        include_once $this->view('app/myProfile/form', $data);
        $content = ob_get_clean();
        echo $content;
    }

    public function update($id)
    {
    }
}
