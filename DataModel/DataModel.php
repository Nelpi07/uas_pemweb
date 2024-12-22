<?php
require_once 'DB.php';

// Mendefinisikan interface DataModelInterface dengan beberapa metode CRUD
interface DataModelInterface
{
    public function getAll(); // Mendapatkan semua data
    public function getById($id); // Mendapatkan data berdasarkan ID
    public function create($data); // Membuat data baru
    public function update($id, $data); // Memperbarui data berdasarkan ID
    public function delete($id); // Menghapus data berdasarkan ID
}

// Mendefinisikan kelas DataModel yang mengimplementasikan DataModelInterface
class DataModel implements DataModelInterface
{
    private $db; // Properti untuk menyimpan koneksi database

    // Konstruktor untuk menginisialisasi koneksi database
    public function __construct()
    {
        $this->db = DB::getInstance()->getConnection();
    }

    // Mendapatkan semua data dari tabel dataBio
    public function getAll()
    {
        $query = "SELECT * FROM dataBio ORDER BY id DESC";
        return $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Mendapatkan data berdasarkan ID dari tabel dataBio
    public function getById($id)
    {
        $query = "SELECT * FROM dataBio WHERE id = :id";
        return $this->db->query($query)->fetch_assoc();
    }

    // Membuat data baru di tabel dataBio
    public function create($data)
    {
        $query = "INSERT INTO dataBio (name, email, job, gender, mt_ip, mt_browser) VALUES (?, ?, ?, ?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param(
            'ssssss',
            $data['name'],
            $data['email'],
            $data['job'],
            $data['gender'],
            $data['mt_ip'],
            $data['mt_browser']
        );
        return $stmt->execute();
    }

    // Memperbarui data berdasarkan ID di tabel dataBio
    public function update($id, $data)
    {
        $query = "UPDATE dataBio SET name = :name, email = :email, job = :job, gender = :gender WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssi', $data['name'], $data['email'], $data['job'], $data['gender'], $id);
        return $stmt->execute();
    }

    // Menghapus data berdasarkan ID dari tabel dataBio
    public function delete($id)
    {
        $query = "DELETE FROM dataBio WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
