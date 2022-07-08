<?php

class KategoriModel
{
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAllKategoriActive()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE status_kategori = '1'");
        return $this->db->resultSet();
    }

    public function getKategoriById($id)
    {
        if ($id == 0 || $id == NULL) {
            return false;
        }

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kategori=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahKategori($data, $img)
    {
        if (
            $data == [] ||
            $data['nama'] == null ||
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
					('', :nama, '1', :gambar, NOW(), NOW())";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('gambar', $gambar);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusKategori($id)
    {
        if ($id == 0) {
            return false;
        }

        $query = "DELETE FROM " . $this->table . " WHERE id_kategori = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahStatus($data)
    {
        if ($data == [] || $data['id'] == null || $data['status'] == null) {
            return false;
        }
        $query = "UPDATE " . $this->table . " SET status_kategori=:status WHERE id_kategori = :id";
        $this->db->query($query);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahKategori($data, $img)
    {
        if (
            $data == [] ||
            $data['id'] == null ||
            $data['gambarLama'] == null
        ) {
            return false;
        }

        if ($img['gambar']['error'] === 4) {
            $gambar = $data['gambarLama'];
        } else {
            $gambar = $this->upload($img);
        }

        $query = "UPDATE " . $this->table .
            " SET   nama_kategori = :nama, gambar_kategori = :gambar,
                    updated_at = NOW()
					WHERE id_kategori = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
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
        $upload_file = 'img/kategori/';

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
