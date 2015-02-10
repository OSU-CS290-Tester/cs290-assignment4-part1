<?
    if (!array_key_exists("username", $_SESSION) || !array_key_exists("count", $_SESSION)) {
            header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Content 1</title>
    </head>
    <body>
        <p>
            <a href='content1.php'>Content 1</a>
        </p>
    </body>
</head>