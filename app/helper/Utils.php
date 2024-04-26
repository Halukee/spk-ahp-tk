<?php

class Utils extends Controller
{
    public static function printEcho($value)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    public static function generateBreadcrumb($items)
    {
        $breadcrumb = '<ol class="breadcrumb float-sm-right">';
        foreach ($items as $index => $item) {
            if ($index == count($items) - 1) {
                // Jika ini item terakhir, tambahkan kelas 'active'
                $breadcrumb .= '<li class="breadcrumb-item active">' . $item['label'] . '</li>';
            } else {
                // Jika bukan item terakhir, tambahkan link
                $breadcrumb .= '<li class="breadcrumb-item"><a href="' . $item['url'] . '">' . $item['label'] . '</a></li>';
            }
        }
        $breadcrumb .= '</ol>';
        return $breadcrumb;
    }

    public static function urlNow()
    {
        $currentUrl = $_SERVER['REQUEST_URI'];
        $lastSegment = basename($currentUrl);
        return $lastSegment;
    }

    public static function fullUrl()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
        $url = $protocol . "://" . $host . $uri;
        return $url;
    }

    public static function urlRouting()
    {
        $fullUrl = Utils::fullUrl();
        $parsed_url = parse_url($fullUrl);
        $simplified_url = $parsed_url['scheme'] . '://' . $parsed_url['host'] . $parsed_url['path'];
        return $simplified_url;
    }

    public static function uploadFile($nama_file, $direktori, $nama_gambar_pengaturan)
    {
        $upload_dir = $direktori;
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_path = $upload_dir . $nama_gambar_pengaturan;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $file = $_FILES[$nama_file];
        if ($file['size'] > 0) {
            $nama_file = explode('.', $file['name']);
            $nama_file = $nama_file[0];

            $new_filename = str_replace(' ', '_', strtolower($nama_file)) . '_' . date('Y-m-d_H-i-s') . '_' . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

            $upload_path = $upload_dir . $new_filename;
            if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                $data[$nama_file] = $new_filename;
            } else {
                $data[$nama_file] = 'default.png';
            }

            return $data[$nama_file];
        } else {
            if ($nama_gambar_pengaturan != '') {
                return $nama_gambar_pengaturan;
            }
        }
        return 'default.png';
    }

    public function settingApp()
    {
        $settingModel = $this->model('Pengaturan_model');
        $getSetting = $settingModel->getAll()[0];
        $data = $getSetting;
        return $data;
    }

    public function alreadyLogin()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            header('Location: ' . BASEURL . '/Dashboard');
            exit;
        }

        if (isset($_COOKIE['remember_token'])) {
            $users = $this->model('Users_model');
            $user = $users->getUserByToken($_COOKIE['remember_token']);

            if ($user) {
                $current_time = time();
                if ($user['token_expiration'] > $current_time) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['users_id'] = $user['id'];
                    header('Location: /Dashboard');
                    exit;
                } else {
                    unset($_SESSION['logged_in']);
                    unset($_SESSION['users_id']);
                    setcookie('remember_token', '', time() - 3600, '/', null, null, true);
                    header('Location: /Logout');
                    exit;
                }
            } else {
                unset($_SESSION['logged_in']);
                unset($_SESSION['users_id']);
                setcookie('remember_token', '', time() - 3600, '/', null, null, true);
                header('Location: /Logout');
                exit;
            }
        }
    }

    public function notLogin()
    {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
    }

    public function myProfile()
    {
        $myProfile = $this->model('Users_model')->myProfile($_SESSION['users_id']);
        return $myProfile;
    }
}
