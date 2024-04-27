<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active" id="kriteria-tab" data-toggle="pill" href="#kriteria-tab-controls" role="tab" aria-controls="kriteria-tab-controls" aria-selected="true">Kriteria</a>
    <?php
    foreach ($data['kriteria'] as $key => $item) { ?>
        <a class="nav-link" 
        id="<?= $item['kode_kriteria'] ?>_<?= $item['id'] ?>" 
        data-toggle="pill" 
        href="#<?= $item['kode_kriteria'] ?>_<?= $item['id'] ?>_<?=$key ?>" 
        role="tab" 
        aria-controls="<?= $item['kode_kriteria'] ?>_<?= $item['id'] ?>_<?=$key ?>" 
        aria-selected="false">
        <?= $item['nama_kriteria'] ?>
    </a>
    <?php
    }
    ?>
</div>