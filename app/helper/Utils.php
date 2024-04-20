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
}
