<?php

include ('./includes/init.php');

$query = "SELECT * FROM user";
$statement=$connection->prepare($query);
$statement->execute();

$data=$statement->fetchALL(PDO::FETCH_ASSOC);

$index=0;
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
        username:<input type="text" id="username">
        password:<input type="text" id="password">
        email:<input type="text" id="email">
        number:<input type="text" id="number">
        <button onclick="sendData()">submit</button>
    </form>
    <br>
    <br>
    <br>
    <table border="2px">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>E-mail</th>
            <th>number</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $user) { ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['number'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>



    <script src="./js/jquery.min.js"></script>
    <script>
    function sendData(){
        $.ajax({
            url:'./api/insert.php',
            type:'POST',
            data:{
                username:$('#username').val(),
                password:$('#password').val(),
                email:$('#email').val(),
                number:$('#number').val()
            },
            success: function(response) {
                if (response == 0)
                return window.location = './index.php';
            else {
                alert("Data Inserted Successfully !");
                window.location.href = './index.php';
            }
        }
    });
}
</script>
</body>
</html>