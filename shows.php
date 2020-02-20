<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shows</title>
</head>
<body>
<h1>Shows</h1>

<?php

$networkName = $_GET['networkName'];


    $db = new PDO("mysql:host=172.31.22.43;dbname=Rebecca100157685", "Rebecca100157685", "TOqN7o1T_n");

   // if(!empty($networkName)) {
   //   $sql = "UPDATE shows SET showName = :showName, firstYear =:firstYear, networkName = :networkName";
   // }

    //else {
        $sql = "SELECT * FROM shows WHERE networkName = :networkName";
   // }
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':networkName', $networkName, PDO::PARAM_STR, 50);


$cmd->execute();
$shows = $cmd->fetchAll();


// start table

echo '<table><thead><th>Name</th><th>Year</th><th>Network</th></thead>';

// loop through data and display results


foreach ($shows as $value) {
    echo '<tr>
            <td>' . $value['showName'] . '</td>
            <td>' . $value['firstYear'] . '</td>
            <td>' . $value['networkName'] . '</td>
            </tr>';
}

echo '</table>';

$db = null;

?>
</body>
</html>
