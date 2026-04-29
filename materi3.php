<?php
function hello()
{
    echo "Selamat Datang";

}



function tambah($a,$b)
{
    return $a + $b;
}

echo tambah(10,16);

?>


<?php
session_start();

echo "<h2 style='color:blue;'>Materi 3: Function PHP - Kalkulator</h2>";
echo "<hr>";

// function sapa
function sapa($nama) {
    return "Halo, selamat datang $nama <br>";
}

// function kalkulator
function hitung($a, $b, $operator) {
    switch ($operator) {
        case "+":
            return $a + $b;
        case "-":
            return $a - $b;
        case "*":
            return $a * $b;
        case "/":
            if ($b == 0) {
                return "Tidak bisa dibagi 0";
            }
            return $a / $b;
        default:
            return "Operator tidak valid";
    }
}

// PROSES LOGIN
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // LOGIN SEDERHANA (hardcode)
    if ($user == "admin" && $pass == "123") {
        $_SESSION['login'] = true;
    } else {
        echo "<p style='color:red;'>Login gagal!</p>";
    }
}

// LOGOUT
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ");
}
?>

<!-- ================= LOGIN FORM ================= -->
<?php if (!isset($_SESSION['login'])): ?>

<h3>Login</h3>
<form method="post">
    Username: <input type="text" name="username">
    <br><br>
    Password: <input type="password" name="password">
    <br><br>
    <button type="submit" name="login">Login</button>
</form>

<?php else: ?>

<!-- ================= KALKULATOR ================= -->
<h3>Form Input</h3>
<form method="post">
    Nama: <input type="text" name="nama">
    <br><br>

    Angka 1: <input type="number" name="angka1">
    <br><br>

    Angka 2: <input type="number" name="angka2">
    <br><br>

    Operator:
    <select name="operator">
        <option value="+">Penjumlahan (+)</option>
        <option value="-">Pengurangan (-)</option>
        <option value="*">Perkalian (*)</option>
        <option value="/">Pembagian (/)</option>
    </select>
    <br><br>

    <button type="submit" name="kirim">Kirim</button>
</form>

<br>
<form method="post">
    <button name="logout">Logout</button>
</form>

<?php
// CEK JIKA TOMBOL DIKLIK
if (isset($_POST['kirim'])) {

    $nama = $_POST['nama'];
    $a = $_POST['angka1'];
    $b = $_POST['angka2'];
    $operator = $_POST['operator'];

    echo "<hr>";
    echo "<h3 style='color:green;'>Hasil:</h3>";

    if (!empty($nama)) {
        echo sapa($nama);
    }

    if ($a !== "" && $b !== "") {
        echo "Hasil: $a $operator $b = " . hitung($a, $b, $operator) . "<br>";
    }
}
?>

<?php endif; ?>