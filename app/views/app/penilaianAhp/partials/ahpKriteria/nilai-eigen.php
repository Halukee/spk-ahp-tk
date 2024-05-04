<div class="card">
    <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#peritunganEigenValue" aria-expanded="false" aria-controls="peritunganEigenValue">
                Perhitungan Nilai Eigen Value
            </button>
        </h2>
    </div>
    <div id="peritunganEigenValue" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <?php
                            $no = 1;
                            foreach ($matriksNormalisasi as $kriteria_id1 => $item1) { ?>
                                <th><?= $data['kriteria'][$kriteria_id1]['kode_kriteria'] ?></th>
                            <?php
                            }
                            ?>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $jumlahEigenMax = [];
                        foreach ($matriksNormalisasi as $kriteria_id1 => $item1) { ?>
                            <tr>
                                <td><?= $data['kriteria'][$kriteria_id1]['kode_kriteria'] ?></td>
                                <?php
                                foreach ($item1 as $kriteria_id2 => $item) { ?>
                                    <?php
                                    $jumlahEigenMax[$kriteria_id2][$kriteria_id1] = $item;
                                    ?>
                                    <td><?= Utils::formatRupiah($item); ?></td>
                                <?php
                                }
                                ?>
                                <td><?= Utils::formatRupiah($eigenMax[$kriteria_id1]) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Jumlah</strong></td>
                            <?php
                            foreach ($jumlahEigenMax as $kriteria_id2 => $item) { ?>
                                <?php
                                $sum = array_sum($item);
                                ?>
                                <td>
                                    <strong><?= $sum ?></strong>
                                </td>
                            <?php
                            }
                            ?>
                            <td>
                                <?= array_sum($rowNormalisasi) ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>