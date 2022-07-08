<?php

class KontakModel
{
    private $table = "kontak";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKontak()
    {
        $this->db->query("SELECT id_kontak, nama, judul, pesan, balas_pesan FROM " . $this->table . " INNER JOIN pelanggan USING(id_pelanggan)");
        return $this->db->resultSet();
    }

    public function getJumlahKontakPelanggan()
    {
        $this->db->query("SELECT COUNT(id_kontak) as jumlah FROM " . $this->table . " WHERE id_pelanggan=" . $_SESSION["login"]);
        return $this->db->resultSet();
    }

    public function getKontakPelanggan()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_pelanggan=" . $_SESSION["login"]);
        return $this->db->resultSet();
    }


    public function getKontakById($id)
    {
        if ($id == 0 || $id == NULL) {
            return false;
        }

        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_kontak=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function kirimPesan($data)
    {
        if (
            $data == [] ||
            $data["judul"] == null ||
            $data["pesan"] == null
        ) {
            return false;
        }
        $query = "INSERT INTO " . $this->table . " VALUES('', :id, :judul, :pesan, '')";
        $this->db->query($query);
        $this->db->bind("id", $_SESSION['login']);
        $this->db->bind("judul", $data["judul"]);
        $this->db->bind("pesan", $data["pesan"]);
        $this->db->execute();


        return $this->db->rowCount();
    }

    public function balasPesan($data)
    {
        if ($data == [] || $data["id"] == null || $data["pesan"] == null) {
            return false;
        }
        $query = "UPDATE " . $this->table . " SET balas_pesan=:pesan WHERE id_kontak = :id";
        $this->db->query($query);
        $this->db->bind("pesan", $data["pesan"]);
        $this->db->bind("id", $data["id"]);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
