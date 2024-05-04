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