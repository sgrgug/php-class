<?php

// 1. connection 
$db_name = "mysql:host=localhost;dbname=products";
$conn = new PDO($db_name, "root", "");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">

    <label for="">Name</label> <br />
    <input type="text" name="name"> <br />
    <label for="">Cost</label> <br />
    <input type="number" name="cost"> <br />
    <label for="">Descrioption</label> <br />
    <textarea name="description" id="" cols="30" rows="10"></textarea>

    <br>
    <input type="submit" value="Create" name="create">

</form>

<?php

    if(isset($_POST['create'])) {

        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $description = $_POST['description'];

        $sql = $conn->prepare("INSERT INTO products (name, cost, description) VALUES (:name, :cost, :description)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':cost', $cost);
        $sql->bindParam(':description', $description);
        $sql->execute();

        echo "Data inserted successfully";

    }

?>


</body>
</html>