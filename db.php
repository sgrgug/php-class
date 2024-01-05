<?php

// 1. connection 
$db_name = "mysql:host=localhost;dbname=products";
$conn = new PDO($db_name, "root", "");


// 2. run sql query
// $conn->query('SELECT * FROM products');
$sql = $conn->prepare('SELECT * FROM products');
$sql->execute();

$results = $sql->fetchAll(PDO::FETCH_OBJ);


// echo "<pre>";
// print_r($results);
// echo "</pre>";


foreach($results as $result) {
    echo $result->name;
    echo "<br />";
}


// 3. connection close
// $conn = null;
?>