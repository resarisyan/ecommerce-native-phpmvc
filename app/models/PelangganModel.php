<?php

class PelangganModel
{
    private $table = "pelanggan";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPelanggan()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getJumlahPelanggan()
    {
        $this->db->query("SELECT COUNT(id_pelanggan) as jumlah FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getPelangganById($id)
    {
        if ($id == 0 || $id == NULL) {
            return false;
        }

        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_pelanggan=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambahPelanggan($data)
    {
        if (
            $data == [] ||
            $data["nama"] == null
        ) {
            return false;
        }

        $query = "INSERT INTO " . $this->table . "
					VALUES
					('', :nama, '1', NOW(), NOW())";
        $this->db->query($query);
        $this->db->bind("nama", $data["nama"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusPelanggan($id)
    {
        if ($id == 0) {
            return false;
        }

        $query = "DELETE FROM " . $this->table . " WHERE id_pelanggan = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahStatus($data)
    {
        if ($data == [] || $data["id"] == null || $data["status"] == null) {
            return false;
        }
        $query = "UPDATE " . $this->table . " SET status_pelanggan=:status WHERE id_pelanggan = :id";
        $this->db->query($query);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("id", $data["id"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // public function ubahKategori($data)
    // {
    //     if (
    //         $data == []
    //     ) {
    //         return false;
    //     }

    //     $query = "UPDATE " . $this->table .
    //         " SET   nama_kategori = :nama,
    //                 updated_at = NOW()
    // 				WHERE id_kategori = :id";
    //     $this->db->query($query);
    //     $this->db->bind("nama", $data["nama"]);
    //     $this->db->bind("id", $data["id"]);
    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
}
