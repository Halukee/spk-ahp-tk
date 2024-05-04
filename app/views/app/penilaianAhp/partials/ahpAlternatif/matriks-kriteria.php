<div class="card">
    <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#matriksPerbandingan" aria-expanded="true" aria-controls="matriksPerbandingan">
                Matriks Perbandingan Antar Alternatif
            </button>
        </h2>
    </div>

    <div id="matriksPerbandingan" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <?php
                            $no = 1;
                            foreach ($matriksOriginal as $alternatif_id1 => $item1) { ?>
                                <th><?= $data['alternatif'][$alternatif_id1]['kode_profile'] ?></th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($matriksOriginal as $alternatif_id1 => $item1) { ?>
                            <tr>
                                <td><?= $data['alternatif'][$alternatif_id1]['kode_profile'] ?></td>
                                <?php
                                foreach ($item1 as $alternatif_id2 => $item) { ?>
                                    <td><?= $item; ?></td>
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