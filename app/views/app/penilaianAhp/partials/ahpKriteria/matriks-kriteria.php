<div class="card">
    <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#matriksPerbandingan" aria-expanded="true" aria-controls="matriksPerbandingan">
                Matriks Perbandingan Antar Kriteria
            </button>
        </h2>
    </div>

    <div id="matriksPerbandingan" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <?php
                            $no = 1;
                            foreach ($matriksOriginal as $kriteria_id1 => $item1) { ?>
                                <th><?= $data['kriteria'][$kriteria_id1]['kode_kriteria'] ?></th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($matriksOriginal as $kriteria_id1 => $item1) { ?>
                            <tr>
                                <td><?= $data['kriteria'][$kriteria_id1]['kode_kriteria'] ?></td>
                                <?php
                                foreach ($item1 as $kriteria_id2 => $item) { ?>
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