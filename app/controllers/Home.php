<?php

class Home extends Controller
{
    public function index()
    {
        $template = new Template();
        $template->assign('title', 'Halaman Login');
        $template->display($this->view('layouts/template'));
    }
}
