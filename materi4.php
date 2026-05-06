<form action="" method="post">
    Username : <input type="text" name="username"><br>
    Password : <input type="password" name="password"><br>
    Nama  : <input type="text" name="nama"><br>
    Email : <input type="text" name="email"><br>
    <input type="submit" value="Kirim Data" name="kirim"><br>
</form>

<?php
include 'koneksi.php';
if (isset($_POST['kirim'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "INSERT INTO user (username, password, nama, email) VALUES ('$username', '$password', '$nama', '$email')";

    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data gagal ditambahkan";
    }
}

?>

<table boarder="1" cellpading="10" cellspacing="0">
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>


<?php
$query = "SELECT * FROM user";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['nama'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td><a href='materi4.php?id=" . $row['id'] . "'>Edit | <a href='materi4.php?id=" . $row['id'] . "'>Hapus</a></td>";
    echo "</tr>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM user WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Data gagal dihapus";
    }
}
?>
</table>