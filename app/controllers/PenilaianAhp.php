<?php

class PenilaianAhp extends Controller
{
    public $datastatis = [];
    public function __construct()
    {
        $utils = new Utils();
        $utils->notLogin();
        require_once './app/config/datastatis.php';
        $this->datastatis = $data['statis'];
    }

    public function index()
    {
        $template = new Template();
        // breadcrumbs
        $breadcrumbItems = [
            ['url' => BASEURL . '/Dashboard', 'label' => 'Home'],
            ['url' => BASEURL . '/PenilaianAhp', 'label' => 'Penilaian AHP'],
        ];

        $valueMatriks = [];

        $data['kriteria'] = $this->model('Kriteria_model')->getAll();
        foreach ($data['kriteria'] as $key1 => $item1) {
            foreach ($data['kriteria'] as $key2 => $item2) {
                $nilai = null;
                if ($key1 == $key2) {
                    $nilai = '<span 
                    data-kriteria_id1="' . $item1['id'] . '"
                    data-kriteria_id2="' . $item2['id'] . '"
                    data-row="' . $key1 . '" data-column="' . $key2 . '" 
                    data-value="1"
                    class="invers_matrix data_matriks">
                    1
                    </span>';
                }

                if ($key2 > $key1) {
                    $nilai = '
                    <select name="select_matrix" class="form-control data_matriks"
                    data-kriteria_id1="' . $item1['id'] . '"
                    data-kriteria_id2="' . $item2['id'] . '"
                    data-value=""
                    data-row="' . $key1 . '" data-column="' . $key2 . '">
                        <option value="">-- Pilih Value --</option>';
                    foreach ($this->datastatis['matriks'] as $value => $item) {
                        $nilai .= '<option value="' . $value . '">' . $item . '</option>';
                    }
                    $nilai .= '
                    </select>';
                }

                if ($key1 != $key2) {
                    if ($key1 > $key2) {
                        $nilai = '<span 
                        data-kriteria_id1="' . $item1['id'] . '"
                        data-kriteria_id2="' . $item2['id'] . '"
                        data-row="' . $key1 . '" data-column="' . $key2 . '" 
                        data-value=""
                        class="invers_matrix data_matriks">
                        0
                        </span>';
                    }
                }

                $valueMatriks[$item1['kode_kriteria']][$key2] = $nilai;
            }
        }
        $data['value_matrix'] = $valueMatriks;
        $data['breadcrumbs'] = $breadcrumbItems;
        ob_start();
        include_once $this->view('app/penilaianAhp/index', $data);
        $content = ob_get_clean();


        $template->assign('title', 'Halaman Penilaian AHP');
        $template->assign('content', $content);
        $template->assign('custom_js', '
        <script class="baseurl" data-value="' . BASEURL . '"></script>
        <script src="' . BASEURL . '/public/js/app/penilaianAhp/index.js"></script>
        ');



        $template->display($this->view('layouts/app'));
    }

    public function initialData()
    {
        echo json_encode([
            'data_statis' => $this->datastatis,
        ]);
    }

    public function prosesAhp()
    {
        $data = $_POST;
        $output = Utils::perhitunganAHP($data, $this->datastatis);
        if (isset($data['is_kriteria'])) {
            $_SESSION['ahp_kriteria'] = $output;
        }
        echo json_encode($output);
    }
}
