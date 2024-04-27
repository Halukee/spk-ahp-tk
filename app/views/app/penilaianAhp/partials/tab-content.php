<div class="tab-content" id="vert-tabs-tabContent">
    <div class="tab-pane text-left fade show active" id="kriteria-tab-controls" role="tabpanel" aria-labelledby="kriteria-tab">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <?php
                        foreach ($data['kriteria'] as $key => $item) { ?>
                            <th><?= $item['kode_kriteria'] ?></th>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['value_matrix'] as $kode_kriteria => $value) { ?>
                        <tr>
                            <td><?= $kode_kriteria ?></td>
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

    </div>
    <?php
    foreach ($data['kriteria'] as $key => $item) { ?>
        <div class="tab-pane fade" id="<?= $item['kode_kriteria'] ?>_<?= $item['id'] ?>_<?= $key ?>" role="tabpanel" aria-labelledby="<?= $item['kode_kriteria'] ?>_<?= $item['id'] ?>">
            <?= $item['nama_kriteria'] ?>
        </div>
    <?php
    }
    ?>
</div>