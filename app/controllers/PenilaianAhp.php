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
        $valueMatriksAlternatif = [];

        $data['kriteria'] = $this->model('Kriteria_model')->getAll();
        foreach ($data['kriteria'] as $key1 => $item1) {
            foreach ($data['kriteria'] as $key2 => $item2) {
                $nilai = null;
                $kriteria_id1 = $item1['id'];
                $kriteria_id2 = $item2['id'];
                $dataSelected = $_SESSION['ahp_kriteria']['matriks_perbandingan_original'][$kriteria_id1][$kriteria_id2] ?? '';

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
                    data-value="' . $dataSelected . '"
                    data-row="' . $key1 . '" data-column="' . $key2 . '">
                        <option value="">-- Pilih Value --</option>';
                    foreach ($this->datastatis['matriks'] as $value => $item) {
                        $selectedData = strval($value) == $dataSelected ? 'selected' : '';
                        $nilai .= '<option value="' . $value . '" ' . $selectedData . '>' . $item . '</option>';
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
                        data-value="' . $dataSelected . '"
                        class="invers_matrix data_matriks">
                        ' . $dataSelected . '
                        </span>';
                    }
                }

                $valueMatriks[$item1['kode_kriteria']][$key2] = $nilai;
            }
        }

        $data['alternatif'] = $this->model('Siswa_model')->getAll();
        foreach ($data['alternatif'] as $key1 => $item1) {
            foreach ($data['alternatif'] as $key2 => $item2) {
                $nilai = null;
                $alternatif_id1 = $item1['id'];
                $alternatif_id2 = $item2['id'];

                if ($key1 == $key2) {
                    $nilai = '<span 
                    data-alternatif_id1="' . $item1['id'] . '"
                    data-alternatif_id2="' . $item2['id'] . '"
                    data-row="' . $key1 . '" data-column="' . $key2 . '" 
                    data-value="1"
                    class="invers_matrix data_matriks">
                    1
                    </span>';
                }

                if ($key2 > $key1) {
                    $nilai = '
                    <select name="select_matrix" class="form-control data_matriks"
                    data-alternatif_id1="' . $item1['id'] . '"
                    data-alternatif_id2="' . $item2['id'] . '"
                    data-value="' . $dataSelected . '"
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
                        data-alternatif_id1="' . $item1['id'] . '"
                        data-alternatif_id2="' . $item2['id'] . '"
                        data-row="' . $key1 . '" data-column="' . $key2 . '" 
                        data-value=""
                        class="invers_matrix data_matriks">
                        ' . $dataSelected . '
                        </span>';
                    }
                }

                $valueMatriksAlternatif[$item1['kode_profile']][$key2] = $nilai;
            }
        }

        $data['value_matrix'] = $valueMatriks;
        $data['value_matrix_alternatif'] = $valueMatriksAlternatif;
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

    public function resultDataAhp()
    {
        $ahpKriteria = isset($_SESSION['ahp_kriteria']) ? $_SESSION['ahp_kriteria'] : [];
        $ahpAlternatif = isset($_SESSION['ahp_alternatif']) ? $_SESSION['ahp_alternatif'] : [];
        $kriteria = $this->model('Kriteria_model')->getAll();

        echo json_encode([
            'ahp_kriteria' => $ahpKriteria,
            'ahp_alternatif' => $ahpAlternatif,
            'kriteria' => $kriteria,
        ]);
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
        if ($data['is_kriteria']) {
            $_SESSION['ahp_kriteria'] = $output;
        } else {
            $_SESSION['ahp_alternatif'][$data['kriteria_id']] = $output;
        }
        echo json_encode($data);
    }

    public function resultAhp()
    {
        $dataGet = $_GET;
        if ($dataGet['tipe'] == 'kriteria') {
            $data['kriteria'] = $this->model('Kriteria_model')->getAll();
            $pushKriteria = [];
            foreach ($data['kriteria'] as $key => $item) {
                $pushKriteria[$item['id']] = $item;
            }
            $data['kriteria'] = $pushKriteria;
            $data['ahp_kriteria'] = $_SESSION['ahp_kriteria'];
            ob_start();
            include_once $this->view('app/penilaianAhp/result', $data);
            $content = ob_get_clean();
            echo ($content);
        } else {
            $data['kriteria'] = $this->model('Kriteria_model')->getById($dataGet['kriteria_id']);
            $data['alternatif'] = $this->model('Siswa_model')->getAll();
            $pushAlternatif = [];
            foreach ($data['alternatif'] as $key => $item) {
                $pushAlternatif[$item['id']] = $item;
            }
            $data['alternatif'] = $pushAlternatif;
            $data['ahp_alternatif'] = $_SESSION['ahp_alternatif'][$dataGet['kriteria_id']];
            ob_start();
            include_once $this->view('app/penilaianAhp/resultAhp', $data);
            $content = ob_get_clean();
            echo ($content);
        }
    }

    public function lastResultAhp()
    {
        $data['ahp_kriteria'] = $_SESSION['ahp_kriteria'];
        $data['ahp_alternatif'] = $_SESSION['ahp_alternatif'];
        $data['kriteria'] = $this->model('Kriteria_model')->getAll();
        $pushKriteria = [];
        $save_hasil_akhir = [];
        foreach ($data['kriteria'] as $key => $item) {
            $pushKriteria[$item['id']] = $item;
        }
        $data['kriteria'] = $pushKriteria;
        $pushAlternatif = [];
        foreach ($data['ahp_alternatif'] as $kriteria_id => $jenis) {
            foreach ($jenis as $keyJenis => $itemAlternatif) {
                if ($keyJenis === 'perhitungan_bobot_prioritas') {
                    foreach ($itemAlternatif as $alternatifId => $value) {
                        $pushAlternatif[$alternatifId][$kriteria_id] = $value;
                    }
                }
            }
        }
        $data['bobot_alternatif'] = $pushAlternatif;
        $save_hasil_akhir['bobot_alternatif'] = $pushAlternatif;

        $data['alternatif'] = $this->model('Siswa_model')->getAll();
        $pushDataAlternatif = [];
        foreach ($data['alternatif'] as $key => $item) {
            $pushDataAlternatif[$item['id']] = $item;
        }
        $data['alternatif'] = $pushDataAlternatif;


        $pushNewBobot = [];
        foreach ($data['bobot_alternatif'] as $alternatifId => $itemKriteria) {
            foreach ($itemKriteria as $kriteria_id => $value) {
                $bobotKriteria = $data['ahp_kriteria']['perhitungan_bobot_prioritas'][$kriteria_id];
                $calculate = $value * $bobotKriteria;
                $pushNewBobot[$alternatifId][$kriteria_id] = $calculate;
            }
        }
        $data['bobot_akhir'] = $pushNewBobot;
        $save_hasil_akhir['bobot_akhir'] = $pushNewBobot;

        $sumBobot = [];
        foreach ($pushNewBobot as $alternatif_id => $item) {
            $sumBobot[$alternatif_id] = array_sum($item);
        }

        $hasilBobot = $sumBobot;
        $data['hasil_bobot'] = $hasilBobot;
        $save_hasil_akhir['hasil_bobot'] = $hasilBobot;

        $data['ranking'] = $hasilBobot;
        arsort($data['ranking']);
        $save_hasil_akhir['ranking'] = $data['ranking'];
        $_SESSION['hasil_akhir'] = $save_hasil_akhir;

        ob_start();
        include_once $this->view('app/penilaianAhp/lastResultAhp', $data);
        $content = ob_get_clean();
        echo ($content);
    }
}
