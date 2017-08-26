<?php session_start();
if(!isset($_SESSION['userName']))header("location:login.php");
require_once("db_connect.php");

$contact_me=$db->query("select * from contact_me;");

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
        <button><a href="admin.php"><img src="img/logo.png" alt="logo"></a></button>
        <nav>
            <ul id="nav">
                <li class="active"><a href="admin.php">Admin</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!--<div class="banner">

    </div>-->

    <div class="main-and-sidebar-wrapper">
        <section class="main">
            <h2>WelCome Admin!</h2>
            <?php
            if ($contact_me->num_rows > 0) {
            ?>
            <table>
                <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                <?php
                    // output data of each row
                    $sl=1;
                    while($row = $contact_me->fetch_object()) {
                        echo "<tr><td>$sl</td>";
                        echo "<td>$row->fullName</td>";
                        echo "<td>$row->eMail</td>";
                        echo "<td>$row->subject</td>";
                        echo "<td>$row->message</td></tr>";
                        $sl++;
                    }

                ?>
            </table>
            <?php
            } else {
                echo "You have no data!";
            }
            ?>
        </section>

        <aside class="sidebar">
            <h3>Sidebar</h3>
            <hr><br>
            <p>Some sidebar content goes here</p>
        </aside>
    </div>

    <footer>
        <h3>Footer</h3>
        <p>&copy; super duper <a href="admin.php">Anamul Hasan</a></p>
    </footer>

</div>
</body>
</html>