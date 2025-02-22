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
                            <th>Alternatif</th>
                            <?php
                            $no = 1;
                            foreach ($matriksNormalisasi as $alternatif_id1 => $item1) { ?>
                            <?php 
                            $kodeProfile = $data['alternatif'][$alternatif_id1]['kode_profile'];
                            ?>
                                <th>
                                <span data-toggle="tooltip" data-placement="top" title="<?= $data['toconvert_alternatif'][$kodeProfile] ?>">
                                    <?= $kodeProfile ?>
                                </span>
                                </th>
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
                        foreach ($matriksNormalisasi as $alternatif_id1 => $item1) { ?>
                        <?php 
                            $kodeProfile = $data['alternatif'][$alternatif_id1]['kode_profile'];
                            ?>
                            <tr>
                                <td>
                                <span data-toggle="tooltip" data-placement="left" title="<?= $data['toconvert_alternatif'][$kodeProfile] ?>">
                                    <?= $kodeProfile ?>
                                </span>
                                </td>
                                <?php
                                foreach ($item1 as $alternatif_id2 => $item) { ?>
                                    <?php
                                    $jumlahEigenMax[$alternatif_id2][$alternatif_id1] = $item;
                                    ?>
                                    <td><?= Utils::formatRupiah($item); ?></td>
                                <?php
                                }
                                ?>
                                <td><?= Utils::formatRupiah($eigenMax[$alternatif_id1]) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Jumlah</strong></td>
                            <?php
                            foreach ($jumlahEigenMax as $alternatif_id2 => $item) { ?>
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