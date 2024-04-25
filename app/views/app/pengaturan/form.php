<form action="<?= $data['action'] ?>" method="post" id="form-submit">
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Nama Aplikasi</label>
                    <input type="text" name="nama_pengaturan" class="form-control" placeholder="Nama aplikasi...">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Pembuat Aplikasi</label>
                    <input type="text" name="pembuat_pengaturan" class="form-control" placeholder="Pembuat aplikasi...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">No. Kontak</label>
                    <input type="number" name="nokontak_pengaturan" class="form-control" placeholder="No. Kontak...">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat_pengaturan" class="form-control" placeholder="Alamat..."></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar_pengaturan" class="form-control" />
        </div>

    </div>
    <div>
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            <i class="fa-solid fa-x"></i> Batal
        </button>
        <button type="submit" class="btn btn-primary" id="btn-submit">
            <i class="fa-regular fa-paper-plane"></i> Submit
        </button>
    </div>
</form>
<script src="<?= BASEURL ?>/public/js/app/pengaturan/form.js"></script>