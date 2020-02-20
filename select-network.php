<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Network List</h1>

<?php

$networkName = null;

if (!empty($_GET['networkName'])) {
    //if there is, query the DB for details on this record to populate the form
    $networkName = $_GET['networkName'];

    $db = new PDO("mysql:host=172.31.22.43;dbname=Rebecca100157685", "Rebecca100157685", "TOqN7o1T_n");

    $sql = "SELECT * FROM networks WHERE networkName = $networkName";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':networkName', $networkName, PDO::PARAM_STR, 50);
    $cmd->execute();
    $networks = $cmd->fetch();

    //populate the variables from the query result

    $networkName = $networks['networkName'];
    }
    ?>

<form action="shows.php" method="POST">

    <fieldset>
        <label for="networkName">Choose a Network:</label>
        <?php

        $servername = "172.31.22.43";
        $username = "Rebecca100157685";
        $password = "TOqN7o1T_n";

        $db = new PDO("mysql:host=$servername;dbname=Rebecca100157685", $username, $password); // connect to the DB

        $sql = "SELECT networkName FROM networks";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $networks  = $cmd->fetchAll();
        echo '<select name="networkName" id="networkName">';
        echo '<option>Please select...</option>';
        foreach ($networks as $value) {

            echo '<option value ="">' .$value['networkName'].'</option>';
        }

        echo '</select>';
        ?>

    </fieldset>
    <br />
    <button>Get Shows</button>
</form>
</body>
</html>
