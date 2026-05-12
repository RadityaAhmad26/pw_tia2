<form action="" method="post">
    username : <input type="text" name="username"><br>
    password : <input type="password" name="password"><br>
    Nama : <input type="text" name="nama"><br>
    Email : <input type="email" name="email"><br>
    <input type="submit" value="Kirim data" name="kirim">
</form>

<?php
include "koneksi.php";
if (isset($_POST["kirim"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];

    $query = "INSERT INTO user (username, password, nama, email) VALUES ('$username', '$password', '$nama', '$email')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

?>

<table border="1" cellpadding="15" cellspacing="0">
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Edit</th>
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
        echo "<td> <a href='materi4.php?hapus=" . $row['id_user'] . "'>Hapus</a> | <a href='materi4.php?edit=" . $row['id_user'] . "'>Edit</a></td>";
        echo "</tr>";
    } 

        if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        $query = "DELETE FROM user WHERE id_user = '$id'";
        if (mysqli_query($koneksi, $query)) {
            echo "Data berhasil dihapus";
            header("Location: materi4.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
        }

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = "SELECT * FROM user WHERE id_user = '$id'";
        $result = mysqli_query($koneksi, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            echo "<form method='POST'>";
            echo "Username: <input type='text' name='username' value='" . $row['username'] . "'><br>";
            echo "Password: <input type='password' name='password' value='" . $row['password'] . "'><br>";
            echo "Nama: <input type='text' name='nama' value='" . $row['nama'] . "'><br>";
            echo "Email: <input type='email' name='email' value='" . $row['email'] . "'><br>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";

            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nama']) && isset($_POST['email'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $nama = $_POST['nama'];
                $email = $_POST['email'];

                $updateQuery = "UPDATE user SET username='$username', password='$password', nama='$nama', email='$email' WHERE id_user='$id'";
                if (mysqli_query($koneksi, $updateQuery)) {
                    echo "Data berhasil diupdate";
                    header("Location: materi4.php");
                } else {
                    echo "Error: " . $updateQuery . "<br>" . mysqli_error($koneksi);
                }
            }
            } else {
                echo "Data tidak ditemukan";
            }
    }   
    ?>

</table>