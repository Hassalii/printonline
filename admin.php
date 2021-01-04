<?php 
require_once("config.php");
$sql = "SELECT * FROM upload";
$result = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-EasyPrint</title>
</head>
<body>
    <table>
    <tr>
    </tr>
    <th>Nama Lengkap</th>
    <th>Nomer Handphone</th>
    <th>Lokasi Terkini</th>
    <th>Nama File</th>
    <th>Jumlah Lembar</th>

    <?php 
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<td>".$user_data['name']."</td>";
        echo "<td>".$user_data['nomer']."</td>";
        echo "<td>".$user_data['alamat']."</td>";   
        echo "<td>".$user_data['file']."</td>";   
        echo "<td>".$user_data['lembar']."</td>";
    }
    ?>
    </table>
</body>
</html>