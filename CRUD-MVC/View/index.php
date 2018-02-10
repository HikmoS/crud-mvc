<?php
include("../Controller/controller.php");
$cont = new controller();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD MVC</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
    <h2>CRUD TABLE</h2>
    <br/><br/>
    <a href="add"><button type="button" class="btn btn-primary">Add User +</button></a>



    <br/><br/>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
        </tr>
        </thead>

        <tbody>

        <?php
        foreach ($cont->liste() as $row){

            ?>
            <tr>
                <td><?php echo $row['u_id'];?></td>
                <td><?php echo $row['fname'];?></td>
                <td><?php echo $row['lname'];?></td>
                <td><a href="delete?id=<?php echo $row['u_id'];?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                <td><a href="edit?uid=<?php echo $row['u_id'];?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
            </tr>
        <?php }?>
        </tbody>



    </table>
</div>
</body>
</html>