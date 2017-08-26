<?php session_start();
if(isset($_SESSION['userName']))header("location:admin.php");
include_once ('db_connect.php');

if(isset($_POST["submit"])){
    $userName = $_POST["userName"];
    $passWord = $_POST["passWord"];

    $stmt = $db->prepare('SELECT userName,passWord FROM `admin_user` WHERE userName = ?');
    $stmt->bind_param('s', $userName);
    $stmt->execute();

    $result = $stmt->get_result();
    $errors = array();
    $data_object = $result->fetch_object();
    //var_dump($data_object->passWord,$data_object->userName);

    if($data_object!==NULL && $data_object->passWord===$passWord){
        $_SESSION['userName'] = $data_object->userName;
        header("Location: admin.php");
    }else if($result->num_rows===0){
        $errors[]="Username NOT match!";
    }else if($data_object!==NULL && $data_object->passWord!=$passWord){
        $errors[]="Password NOT match!";
    }

    $stmt->close();
    $db->close();
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexbox Layout</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="container">
    <header>
        <button><a href="home.html"><img src="img/logo.png" alt="logo"></a></button>
        <nav>
            <ul id="nav">
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About Me</a>
                    <ul>
                        <li><a href="personal_info.html">Personal Info</a></li>
                        <li><a href="educational_info.html">Educational Info</a></li>
                        <li><a href="work_info.html">Work Info</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact Me</a></li>
                <li class="active"><a href="login.php">Admin</a></li>
            </ul>
        </nav>
    </header>
    <div class="banner">
    </div>
    <div class="main-and-sidebar-wrapper">
        <section class="main">
            <?php
            if(!empty($errors)){
                foreach ($errors as $error){
                    echo "<b style='color:red;'>$error</b>";
                }
            }
            ?>
            <div class="form-style-6">
                <h1>Login</h1>
                <form name="login" action="" method="post" onsubmit="return formValid2();">
                    <input type="text" name="userName" placeholder="UserName" />
                    <input type="password" name="passWord" placeholder="Password" />
                    <input type="submit" name="submit" value="Go" />
                </form>
            </div>
        </section>
        <aside class="sidebar">
            <h3>Sidebar</h3>
            <hr><br>
            <p>Some sidebar content goes here</p>
        </aside>
    </div>
    <footer>
        <h3>Footer</h3>
        <p>&copy; super duper <a href="home.html">Anamul Hasan</a></p>
    </footer>
</div>
<script src="js/main.js"></script>
</body>
</html>