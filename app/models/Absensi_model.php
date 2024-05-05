<?php

class Absensi_model extends Controller
{
    private $table = 'absensi';
    private $db;
    private $stringDefault = 'SELECT absensi.*, profile.nama_profile, profile.alamat_profile, profile.jeniskelamin_profile, profile.nomorhp_profile, profile.kode_profile, roles.nama_roles FROM absensi
    JOIN users on absensi.users_id = users.id
    JOIN profile on profile.users_id = users.id
    JOIN role_user on users.id = role_user.users_id
    JOIN roles on roles.id = role_user.roles_id';

    private $countDefault = 'SELECT COUNT(*) as total FROM absensi
    JOIN users on absensi.users_id = users.id
    JOIN profile on profile.users_id = users.id
    JOIN role_user on users.id = role_user.users_id
    JOIN roles on roles.id = role_user.roles_id';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll($siswa_id = null)
    {
        $queryText = $this->stringDefault . ' WHERE LOWER(roles.nama_roles) = :nama_roles';
        if ($siswa_id != null) {
            $queryText .= ' AND users.id = :siswa_id';
        }
        $this->db->query($queryText);
        $this->db->bind('nama_roles', 'siswa');
        if ($siswa_id != null) {
            $this->db->bind('siswa_id', $siswa_id);
        }
        return $this->db->resultSet();
    }

    public function countAll()
    {
        $this->db->query($this->countDefault . ' WHERE LOWER(roles.nama_roles) = :nama_roles');
        $this->db->bind('nama_roles', 'siswa');
        return $this->db->single();
    }

    public function getById($id)
    {
        $this->db->query($this->stringDefault . ' 
        WHERE LOWER(roles.nama_roles) = :nama_roles
        AND absensi.id = :id');
        $this->db->bind('nama_roles', 'siswa');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = "INSERT INTO absensi (nama_absensi, keterangan_absensi, users_id, tanggal_absensi)
        VALUES (:nama_absensi, :keterangan_absensi, :users_id, :tanggal_absensi)";

        $this->db->query($query);
        $this->db->bind('nama_absensi', $data['nama_absensi']);
        $this->db->bind('keterangan_absensi', $data['keterangan_absensi']);
        $this->db->bind('users_id', $data['users_id']);
        $this->db->bind('tanggal_absensi', $data['tanggal_absensi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $query = "DELETE FROM absensi WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function update($data, $id)
    {
        $query = "UPDATE absensi SET 
        nama_absensi = :nama_absensi, 
        keterangan_absensi = :keterangan_absensi, 
        users_id = :users_id, 
        tanggal_absensi = :tanggal_absensi
        WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama_absensi', $data['nama_absensi']);
        $this->db->bind('keterangan_absensi', $data['keterangan_absensi']);
        $this->db->bind('users_id', $data['users_id']);
        $this->db->bind('tanggal_absensi', $data['tanggal_absensi']);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
