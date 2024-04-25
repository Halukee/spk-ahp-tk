<?php

class Utils
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

    public static function uploadFile($nama_file, $direktori)
    {
        $file = $_FILES[$nama_file];
        $upload_dir = $direktori;

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

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
    }
}
