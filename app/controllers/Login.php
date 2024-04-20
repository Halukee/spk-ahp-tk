<?php

class Login extends Controller
{
    public function index()
    {
        $template = new Template();
        ob_start();
        require_once $this->view('home/index');
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Login');
        $template->assign('content', $content);
        $template->assign('custom_js', '<script src="' . BASEURL . '/public/js/home/index.js"></script>');
        $template->display($this->view('layouts/template'));
    }
}
