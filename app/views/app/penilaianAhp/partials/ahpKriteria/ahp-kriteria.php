<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kriteria</th>
                <?php
                foreach ($data['kriteria'] as $key => $item) { ?>
                    <th>
                        <strong class="btn btn-light" data-toggle="tooltip" data-placement="top" title="<?= $item['nama_kriteria'] ?>">
                            <?= $item['kode_kriteria'] ?>
                        </strong>
                    </th>
                <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['value_matrix'] as $kode_kriteria => $value) { ?>
                <tr>
                    <td>
                        <strong class="btn btn-light" data-toggle="tooltip" data-placement="left" title="<?= $data['toconvert_kriteria'][$kode_kriteria] ?>">
                            <?= $kode_kriteria ?>
                        </strong>
                    </td>
                    <?php
                    foreach ($value as $keyRow => $row) { ?>
                        <td><?= $row; ?></td>
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