<?php
include_once 'Data.php';
include_once 'Student.php';
$result = Data::loadData();
if(isset($_REQUEST['page'])){
    if ($_REQUEST['page'] == 'delete'){
        $id = $_REQUEST['id'];
        array_splice($result,$id,1);
        Data::saveData($result);
        header("location:index.php");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="add-student.php">Add</a>
<table border="1px">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach ($result as $key => $student): ?>
        <tr>
            <td><?php echo $student->getId() ?></td>
            <td><?php echo $student->getName() ?></td>
            <td><a href="index.php?page=delete&id=<?php echo $key ?>">Delete</a></td>
            <td><a href="edit-student.php?id=<?php echo $student->getId() ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
