<?php

include ('../includes/init.php');

$id=$_GET['updateid'];

$query = "SELECT * FROM user WHERE id=$id";
$statement = $connection->prepare($query);
$statement->execute();
$data = $statement->fetch(PDO::FETCH_ASSOC);

// echo $id;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="hidden" id="id" value="<?= $id ?>">
        username:<input type="text" id="username" value="<?=  $data['username'] ?>">
        password:<input type="text" id="password" value="<?=  $data['password'] ?>">
        email:<input type="text" id="email" value="<?=  $data['email'] ?>">
        number:<input type="text" id="number" value="<?=  $data['number'] ?>">
        <button onclick="updateData()">Update</button>
        <!-- <input type="button" onclick="updateData()" value="Update Data"/> -->
    </form>

    <script src="../js/jquery.min.js"></script>
    <script>
    function updateData(){
        $.ajax({
            url:'../api/update.php',
            type:'POST',
            data:{
                id:$('#id').val(),
                username:$('#username').val(),
                password:$('#password').val(),
                email:$('#email').val(),
                number:$('#number').val()
            },
            success: function(response) {
                if (response == 0)
                    return window.location = '../index.php';

                alert("Data Upadated Successfully !");
                window.location.href = '../index.php';
        }
    });
}
</script>
</body>
</html>