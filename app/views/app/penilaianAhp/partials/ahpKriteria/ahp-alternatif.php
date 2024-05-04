<strong> Matriks Perbandingan Alternatif <?= $item['nama_kriteria'] ?></strong>
<hr>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Alternatif</th>
                <?php
                foreach ($data['alternatif'] as $key => $item) { ?>
                    <th><?= $item['kode_profile'] ?></th>
                <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['value_matrix_alternatif'] as $kode_profile => $value) { ?>
                <tr>
                    <td><?= $kode_profile ?></td>
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