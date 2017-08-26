<?php
include_once ('db_connect.php');
function validation($data) {
    global $db;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $db->real_escape_string($data);
    return $data;
}
if(isset($_POST["contact"])){
    $fullName=$_POST["fullName"];
    $eMail=$_POST["eMail"];
    $subject=$_POST["subject"];
    $message=$_POST["message"];

    $fullName=validation($fullName);
    $eMail=validation($eMail);
    $subject=validation($subject);
    $message=validation($message);

    $sql = "INSERT INTO contact_me(fullName,eMail,subject,message)values('$fullName','$eMail','$subject','$message');";

    if ($db->query($sql) === TRUE) {
        $input_message = "New record created successfully";
        ?>
<script>
    setTimeout(function () {window.location.href = "contact.php";}, 2000);
</script>
<?php
    } else {
        $input_message = "Error: " . $sql . "<br>" . $db->error;
    }
    
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
                <li class="active"><a href="contact.php">Contact Me</a></li>
                <li><a href="login.php">Admin</a></li>
            </ul>
        </nav>
    </header>
    <div class="banner"></div>
    <div class="main-and-sidebar-wrapper">
        <section class="main">
            <?php
            if(!empty($input_message)){
                echo "<b style='color:green;'>$input_message</b>";
            }
            ?>
            <div class="form-style-6">
                <h1>Contact</h1>
                <form name="contact" action="" method="post" onsubmit="return formValid()">
                    <input type="text" name="fullName" placeholder="Your Name" />
                    <input type="email" name="eMail" placeholder="Email Address" />
                    <input type="text" name="subject" placeholder="Subject" />
                    <textarea name="message" placeholder="Type your Message"></textarea>
                    <input type="submit" name="contact" value="Send" />
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