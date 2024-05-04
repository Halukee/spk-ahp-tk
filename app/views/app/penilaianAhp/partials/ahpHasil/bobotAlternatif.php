<div class="card">
    <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#bobotAlternatif" aria-expanded="true" aria-controls="bobotAlternatif">
                Hasil Bobot Alternatif
            </button>
        </h2>
    </div>

    <div id="bobotAlternatif" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Alternatif</th>
                            <?php
                            foreach ($data['ahp_alternatif'] as $kriteria_id => $item) { ?>
                                <th><?= $data['kriteria'][$kriteria_id]['kode_kriteria'] ?></th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['bobot_alternatif'] as $alternatif_id => $item) { ?>
                            <tr>
                                <td><?= $data['alternatif'][$alternatif_id]['nama_profile'] ?></td>
                                <?php
                                foreach ($item as $kriteria_id => $value) { ?>
                                    <td><?= Utils::formatRupiah($value) ?></td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>