<?php

class ProdukModel
{
    private $table = "produk";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProduk()
    {
        $this->db->query("SELECT id_produk, nama_produk, harga, deskripsi, status_produk, nama_kategori, gambar FROM " . $this->table . " INNER JOIN kategori USING (id_kategori)");
        return $this->db->resultSet();
    }

    public function getJumlahProduk()
    {
        $this->db->query("SELECT COUNT(id_produk) as jumlah FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getAllProdukByKategori($id)
    {
        $this->db->query("SELECT id_produk, nama_produk, harga, deskripsi, status_produk, gambar, nama_kategori FROM " . $this->table . " INNER JOIN kategori USING (id_kategori) WHERE status_produk = '1' AND id_kategori=" . $id);
        return $this->db->resultSet();
    }

    public function getAllProdukActive()
    {
        $this->db->query("SELECT id_produk, nama_produk, harga, deskripsi, status_produk, nama_kategori, gambar FROM " . $this->table . " INNER JOIN kategori USING (id_kategori) WHERE status_produk = '1' AND status_kategori = '1'");
        return $this->db->resultSet();
    }

    public function getAllProdukActiveDesc()
    {
        $this->db->query("SELECT id_produk, nama_produk, harga, deskripsi, status_produk, nama_kategori, gambar FROM " . $this->table . " INNER JOIN kategori USING (id_kategori) WHERE status_produk = '1' AND status_kategori = '1' ORDER BY id_Produk DESC");
        return $this->db->resultSet();
    }

    public function getProdukById($id)
    {
        if ($id == 0 || $id == NULL) {
            return false;
        }

        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_produk=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambahProduk($data, $img)
    {
        if (
            $data == [] ||
            $data["nama"] == null ||
            $data["harga"] == null ||
            $data["kategori"] == null ||
            $data["deskripsi"] == null ||
            $img["gambar"] == null
        ) {
            return false;
        }


        $gambar = $this->upload($img);
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO " . $this->table . "
        VALUES
        ('', :nama, :harga, :deskripsi, :gambar, '1', :kategori, NOW(), NOW())";
        $this->db->query($query);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("harga", $data["harga"]);
        $this->db->bind("kategori", $data["kategori"]);
        $this->db->bind("deskripsi", $data["deskripsi"]);
        $this->db->bind("gambar", $gambar);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusProduk($id)
    {
        if ($id == 0) {
            return false;
        }

        $query = "DELETE FROM " . $this->table . " WHERE id_produk = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahProduk($data, $img)
    {
        if (
            $data == [] ||
            $data["id"] == null ||
            $data["nama"] == null ||
            $data["harga"] == null ||
            $data["kategori"] == null ||
            $data["deskripsi"] == null ||
            $data["gambarLama"] == null
        ) {
            return false;
        }

        if ($img["gambar"]["error"] === 4) {
            $gambar = $data["gambarLama"];
        } else {
            $gambar = $this->upload($img);
        }

        $query = "UPDATE " . $this->table . "
					SET 
					nama_produk = :nama,
					harga = :harga,
					id_kategori = :kategori,
					deskripsi = :deskripsi,
                    gambar = :gambar,
                    updated_at = NOW()
					WHERE id_produk = :id";
        $this->db->query($query);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("harga", $data["harga"]);
        $this->db->bind("kategori", $data["kategori"]);
        $this->db->bind("deskripsi", $data["deskripsi"]);
        $this->db->bind("gambar", $gambar);
        $this->db->bind("id", $data["id"]);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahStatus($data)
    {
        if ($data == [] || $data["id"] == null || $data["status"] == null) {
            return false;
        }
        $query = "UPDATE " . $this->table . " SET status_produk=:status WHERE id_produk = :id";
        $this->db->query($query);
        $this->db->bind("status", $data["status"]);
        $this->db->bind("id", $data["id"]);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function upload($img)
    {
        $namaFile = $img["gambar"]["name"];
        $ukuranFile = $img["gambar"]["size"];
        $error = $img["gambar"]["error"];
        $tmpName = $img["gambar"]["tmp_name"];
        $upload_file = "img/produk/";

        if ($error === 4) {
            // echo "<script>
            // 		alert("pilih gambar terlebih dahuku!")
            // 	  </script>";
            return false;
        }
        $ekstensiGambarValid = ["jpg", "jpeg", "png"];
        $ekstensiGambar = explode(".", $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // echo "<script>
            // 		alert("Anda tidak mengupload gambar")
            // 	  </script>";
            return false;
        }

        if ($ukuranFile > 10000000) {
            // echo "<script>
            // 		alert("Ukuran gambar terlalu besar")
            // 	  </script>";
            return false;
        }

        $name = pathinfo($img["gambar"]["name"], PATHINFO_FILENAME);
        $extension = pathinfo($img["gambar"]["name"], PATHINFO_EXTENSION);
        $increment = 0;
        $namaFile = $name . "." . $extension;
        while (is_file($upload_file . "/" . $namaFile)) {
            $increment++;
            $namaFile = $name . "(" . $increment . ")" . "." . $extension;
        }
        move_uploaded_file($tmpName, $upload_file . "/" . $namaFile);
        return $namaFile;
    }

    public function cariProduk()
    {
        if ($_POST['keyword'] == null) {
            header('Location: ' . BASEURL);
            exit;
        }
        $keyword = $_POST['keyword'];
        $query = "SELECT id_produk, nama_produk, harga, deskripsi, status_produk, nama_kategori, gambar FROM " . $this->table . " INNER JOIN kategori USING (id_kategori) WHERE status_produk = '1' AND nama_produk LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
