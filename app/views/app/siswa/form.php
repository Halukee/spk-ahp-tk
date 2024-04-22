<form action="<?= $data['action'] ?>" method="post" id="form-submit">
    <div class="modal-body">
        <div class="form-group row">
            <label for="" class="col-lg-4">Nama</label>
            <div class="col-lg-8">
                <input type="text" name="nama_profile" placeholder="Nama..." class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-lg-4">Alamat</label>
            <div class="col-lg-8">
                <textarea name="alamat_profile" class="form-control" placeholder="Alamat..." id="" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-lg-4">Jenis Kelamin</label>
            <div class="col-lg-8">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jeniskelamin_profile" id="jeniskelamin_profile1" value="L" checked>
                    <label class="form-check-label" for="jeniskelamin_profile1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jeniskelamin_profile" id="jeniskelamin_profile2" value="P">
                    <label class="form-check-label" for="jeniskelamin_profile2">
                        Perempuan
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-lg-4">Peran</label>
            <div class="col-lg-8">
                <select name="roles_id" id="" class="form-control select2">
                    <option value="">-- Peran --</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Guru">Guru</option>
                    <option value="Wali Murid">Wali Murid</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            <i class="fa-solid fa-x"></i> Batal
        </button>
        <button type="submit" class="btn btn-primary" id="btn-submit">
            <i class="fa-regular fa-paper-plane"></i> Submit
        </button>
    </div>
</form>
<script src="<?= BASEURL ?>/public/js/app/siswa/form.js"></script>