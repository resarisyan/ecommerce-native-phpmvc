<?php

class KeranjangModel
{
    private $table = "keranjang";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKeranjangByIdPelanggan()
    {
        $id = $_SESSION['login'];
        $this->db->query("SELECT id_keranjang, qty, total, nama_produk, gambar  FROM " . $this->table . " INNER JOIN produk using(id_produk) WHERE id_pelanggan=:id");
        $this->db->bind("id", $id);
        return $this->db->resultSet();
    }

    public function cekProdukKeranjang($data)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_produk=:idProduk AND id_pelanggan=:idPelanggan");
        $this->db->bind("idProduk", $data['idProduk']);
        $this->db->bind("idPelanggan", $data['idPelanggan']);
        return $this->db->single();
    }

    public function ubahProdukKeranjang($data)
    {
        $query = "UPDATE " . $this->table . " SET qty=qty + :qty, total=total + :total, updated_at=NOW() WHERE id_produk=:idProduk AND id_pelanggan=:idPelanggan";
        $this->db->query($query);
        $this->db->bind("qty", $data["qty"]);
        $this->db->bind("total", $data["total"]);
        $this->db->bind("idProduk", $data['idProduk']);
        $this->db->bind("idPelanggan", $data['idPelanggan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getProdukById($id)
    {
        $this->db->query("SELECT harga FROM produk WHERE id_produk=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambahKeranjang($data)
    {
        if (
            $data == [] ||
            $data["idProduk"] == null ||
            $data["qty"] == null
        ) {
            return false;
        }

        if ($data["qty"] < 1) {
            return false;
        }
        $data["idPelanggan"] = $_SESSION['login'];
        $data["hargaProduk"] = $this->getProdukById($data["idProduk"]);
        if ($data["hargaProduk"] == false) {
            return false;
        }
        $data['total'] = $data["hargaProduk"]['harga'] * $data["qty"];

        if ($this->cekProdukKeranjang($data) > 0) {
            $this->ubahProdukKeranjang($data);
        } else {
            $query = "INSERT INTO " . $this->table . "
					VALUES
					('', :idPelanggan, :idProduk, :qty, :total * :qty, NOW(), NOW())";
            $this->db->query($query);
            $this->db->bind("qty", $data["qty"]);
            $this->db->bind("total", $data["total"]);
            $this->db->bind("idProduk", $data['idProduk']);
            $this->db->bind("idPelanggan", $data['idPelanggan']);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }
}
