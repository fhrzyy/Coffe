<?php
echo "<h3>Daftar Bilangan Genap (1-10):</h3>";
for($i = 1; $i <= 10; $i++) {
    if($i % 2 == 0) {
        echo "$i ";
    }
}

echo "<h3>Tabel Perkalian 5:</h3>";
for($i = 1; $i <= 10; $i++) {
    $hasil = 5 * $i;
    echo "5 x $i = $hasil<br>";
}
?>