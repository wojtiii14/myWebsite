<!doctype html>
<html>
<head>
<title>IoT Project</title>
<meta name="description" content="Hash page">
<link rel="stylesheet" href="login_style.css">
</head>
<body>
  <form method="post">
    <div class="container">
      Password to hash:<br/>
      <input type = "password" name="password1" placeholder="Enter Password to hash" class = "box" />
      </br>
      <button type="submit">Hash</button>
    </div>
  </form>
</body>
</html>

<?php
      if(isset($_POST['password1']))
          $password1 = $_POST['password1'];
          $passhash = password_hash($password1, PASSWORD_DEFAULT);
          echo $passhash;
        exit();
  ?>

