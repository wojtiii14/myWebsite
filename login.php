<?php

    session_start();

    if((!isset($_POST['username'])) || (!isset($_POST['password'])))
    {
        header('Location: admin.php');
        exit();
    }

    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection -> connect_errno != 0)
    {
        echo "Error: ".$connection -> connect_errno;
    }
    else
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = htmlentities($username, ENT_QUOTES, "UTF-8");
        // $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        if($result = @$connection -> query(
            sprintf("select * from admin where user = '%s'",
            mysqli_real_escape_string($connection, $username))))
        {
            $how_many = $result -> num_rows;
            if($how_many > 0)
            {
                $row = $result -> fetch_assoc();

                if(password_verify($password, $row['pass']))
                {
                    $_SESSION['logged'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['user'] = $row['user'];

                    unset($_SESSION['error']);
                    $result -> close();

                    header('Location: panel.php');
                }
                else
                {
                    $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                    header('Location: admin.php');
                }
                
            }
            else
            {
                $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: admin.php');
            }
        }

        $connection -> close();
    }

?>