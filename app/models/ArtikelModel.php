<?php

class ArtikelModel
{
    private $table = 'artikel';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllArtikel()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getJumlahArtikel()
    {
        $this->db->query("SELECT COUNT(id_artikel) as jumlah FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getArtikelById($id)
    {
        if ($id == 0 || $id == NULL) {
            return false;
        }

        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_artikel=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahArtikel($data, $img)
    {
        if (
            $data == [] ||
            $data['judul'] == null ||
            $data['konten'] == null ||
            $img['gambar'] == null
        ) {
            return false;
        }


        $gambar = $this->upload($img);
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO " . $this->table . "
        VALUES
        ('', :judul, :konten, :gambar, NOW(), NOW())";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('konten', $data['konten']);
        $this->db->bind('gambar', $gambar);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusArtikel($id)
    {
        if ($id == 0) {
            return false;
        }

        $query = "DELETE FROM " . $this->table . " WHERE id_artikel = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahArtikel($data, $img)
    {
        if (
            $data == [] ||
            $data['id'] == null ||
            $data['judul'] == null ||
            $data['konten'] == null ||
            $data['gambarLama'] == null
        ) {
            return false;
        }

        if ($img['gambar']['error'] === 4) {
            $gambar = $data['gambarLama'];
        } else {
            $gambar = $this->upload($img);
        }

        $query = "UPDATE " . $this->table . "
					SET 
					judul = :judul,
					konten = :konten,
					gambar = :gambar,
                    updated_at = NOW()
					WHERE id_artikel = :id";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('konten', $data['konten']);
        $this->db->bind('gambar', $gambar);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function upload($img)
    {
        $namaFile = $img['gambar']['name'];
        $ukuranFile = $img['gambar']['size'];
        $error = $img['gambar']['error'];
        $tmpName = $img['gambar']['tmp_name'];
        $upload_file = 'img/artikel/';

        if ($error === 4) {
            // echo "<script>
            // 		alert('pilih gambar terlebih dahuku!')
            // 	  </script>";
            return false;
        }
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // echo "<script>
            // 		alert('Anda tidak mengupload gambar')
            // 	  </script>";
            return false;
        }

        if ($ukuranFile > 10000000) {
            // echo "<script>
            // 		alert('Ukuran gambar terlalu besar')
            // 	  </script>";
            return false;
        }

        $name = pathinfo($img['gambar']['name'], PATHINFO_FILENAME);
        $extension = pathinfo($img['gambar']['name'], PATHINFO_EXTENSION);
        $increment = 0;
        $namaFile = $name . '.' . $extension;
        while (is_file($upload_file . '/' . $namaFile)) {
            $increment++;
            $namaFile = $name . '(' . $increment . ')' . '.' . $extension;
        }
        move_uploaded_file($tmpName, $upload_file . '/' . $namaFile);
        return $namaFile;
    }
}
