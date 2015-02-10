<?php
    session_start();
    $content = "<p>";
    $error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // logging in
        $username = $_POST["username"];
        if ($username == null or strcmp("", $username) == 0) {

            $content .= "A username must be entered. Click <a href='login.php'>here</a> to return to the login screen.</body></html>";
            $error = true;
        } else {
            $_SESSION["username"] = $username;
            $_SESSION["count"] = 0;
        }
    } else {
        if (!array_key_exists("username", $_SESSION) || !array_key_exists("count", $_SESSION)) {
            header("Location: login.php");
        }
        $username = array_key_exists("username", $_GET) ? $_GET["username"] : null;
        $logout = array_key_exists("logout", $_GET) ? 1 : "0";
        if ($logout == 1 && !($username == null or strcmp("", $username) == 0)) {
            // Destroy session
            session_unset();
            session_destroy();
            // Redirect to login.php
            header("Location: login.php");
        }
    }
    if (!$error) {
        // Tell them how many times they've visited
        $content .= "Hello " . $_SESSION["username"] . " you have visited this page " . $_SESSION["count"] . " times before. Click <a href='content1.php?username=" . $_SESSION["username"] . "&logout=1'>here</a> to logout.";
        $content .= "</p><p><a href='content2.php'>Content 2</a></p>";
        $_SESSION["count"] += 1;
    } else {
        $content .= "</p>";
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Content 1</title>
    </head>
    <body>
        <?php
            echo $content;
        ?>
    </body>
</head>