<?php
// Mengambil semua data dari model dan menyimpannya dalam variabel $data
$data = $DataModel->getAll();
?>
<table id="dataTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Job</th>
            <th>Gender</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Mengecek apakah variabel $data sudah di-set
        if (isset($data)) {
            // Melakukan iterasi untuk setiap baris data
            foreach ($data as $row) {
                // Menampilkan data dalam bentuk baris tabel
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['job'] . '</td>';
                echo '<td>' . $row['gender'] . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>