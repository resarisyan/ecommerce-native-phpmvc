<?php

class PemesananModel
{
    private $table = "pemesanan";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPemesanan()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getJumlahPemesananPelanggan()
    {
        $this->db->query("SELECT COUNT(id_pemesanan) as jumlah FROM " . $this->table . " WHERE id_pelanggan=" . $_SESSION["login"]);
        return $this->db->resultSet();
    }

    public function getJumlahPemesanan()
    {
        $this->db->query("SELECT COUNT(id_pemesanan) as jumlah FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getAllPemesananPelanggan()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_pelanggan = " . $_SESSION['login']);
        return $this->db->resultSet();
    }

    public function getDetailPemesanan($id)
    {
        if ($id == 0 || $id == NULL) {
            return false;
        }
        $this->db->query("SELECT nama_produk, harga, qty, total FROM log_pemesanan INNER JOIN pemesanan USING (id_pemesanan) WHERE id_pemesanan = " . $id);
        return $this->db->resultSet();
    }

    public function getDetailPemesananPelanggan($id)
    {
        if ($id == 0 || $id == NULL) {
            return false;
        }
        $this->db->query("SELECT nama_produk, harga, qty, total FROM log_pemesanan INNER JOIN pemesanan USING (id_pemesanan) WHERE id_pemesanan = " . $id . " AND pemesanan.id_pelanggan = " . $_SESSION["login"]);
        return $this->db->resultSet();
    }

    public function getPemesananById($id)
    {
        if ($id == 0 || $id == NULL) {
            return false;
        }

        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_pemesanan=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function ubahStatus($data)
    {
        if ($data == [] || $data["id"] == null || $data["status"] == null) {
            return false;
        }
        $query = "UPDATE " . $this->table . " SET status_pemesanan=:status WHERE id_pemesanan = :id";
        $this->db->query($query);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("id", $data["id"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getKeranjangByIdPelanggan($id)
    {
        $this->db->query("SELECT nama_produk, harga, qty, total, id_pelanggan FROM keranjang INNER JOIN produk using(id_produk) WHERE id_pelanggan=:id");
        $this->db->bind("id", $id);
        return $this->db->resultSet();
    }

    public function getIdPemesananPelanggan($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_pelanggan=:id ORDER BY id_pemesanan DESC LIMIT 1");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function deleteKeranjangByIdPelanggan($id)
    {
        $query = "DELETE FROM keranjang WHERE id_pelanggan = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahPemesanan($data)
    {
        if (
            $data['alamat'] == null ||
            $data['catatan'] == null ||
            $data['pembayaran'] == null
        ) {
            return false;
        } else if ($data['pembayaran'] > 2 and $data['pembayaran'] < 0) {
            return false;
        }

        if ($data['pembayaran'] == 1) {
            $data['jenisPembayaran'] = "Cash";
        } else if ($data['pembayaran'] == 2) {
            $data['jenisPembayaran'] = "Bank";
        }

        $keranjang = $this->getKeranjangByIdPelanggan($_SESSION['login']);
        $data['totalBayar'] = 0;
        foreach ($keranjang as $k) {
            $data['totalBayar'] += $k['total'];
        }
        $data['ongkir'] = $data['totalBayar'] * 10 / 100;

        $query = "INSERT INTO " . $this->table . "
        VALUES
        ('', NOW(), :total, :id_pelanggan, '1', :alamat, :catatan, :pembayaran, :ongkir)";
        $this->db->query($query);
        $this->db->bind("total", $data['totalBayar']);
        $this->db->bind("id_pelanggan", $_SESSION['login']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("catatan", $data['catatan']);
        $this->db->bind("pembayaran", $data['jenisPembayaran']);
        $this->db->bind("ongkir", $data['ongkir']);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            $pemesanan = $this->getIdPemesananPelanggan($_SESSION['login']);
            $query = "INSERT INTO log_pemesanan (nama_produk,harga,qty,total,id_pelanggan, id_pemesanan, created_at, updated_at) 
            SELECT nama_produk,harga,qty, total, id_pelanggan, :id_pemesanan, NOW(), NOW() From keranjang INNER JOIN produk USING(id_produk) WHERE id_pelanggan = :id_pelanggan";
            $this->db->query($query);
            $this->db->bind("id_pemesanan", $pemesanan['id_pemesanan']);
            $this->db->bind("id_pelanggan", $_SESSION['login']);
            $this->db->execute();
            return $this->deleteKeranjangByIdPelanggan($_SESSION['login']);
        } else {
            return false;
        }
    }
}
