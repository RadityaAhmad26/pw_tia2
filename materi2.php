<form method ="POST">
    Masukkan Angka : <input type="number" name="angka"><br>
    <input type="submit" value="kirim">
</form>

<?php
if(isset($_POST['angka'])){
    $data =$_POST['angka'];
    for ($i = 1; $i <= $data; $i++) {
        echo "Angka ke $i <br>";
    }
    if ($data % 2 == 0){
    echo "angka $data adalah bilangan genap";
    }else{
    echo "angka $data adalah bilangan ganjil";
}
}


?>

// Looping While dan Do While

<?php
echo "<br> Ini Perulangan While";

if (isset($_POST['angka'])){
    $data = $_POST['angka'];
    $i = 1;
    while($i<=$data){
        echo "Angka $i <br>";
        $i++;
    }
}


?>

<?php
echo "<br> ini perulangan do while";

if (isset($_POST["angka"])) {
    $data = $_POST["angka"];
    $i = 1;

    do {
        echo "angka $i<br>";
        $i++;
    } while ($i <= $data);
}
?>