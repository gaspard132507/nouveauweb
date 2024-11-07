<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
</head>
<body>
    <h2>Chat</h2>
    <form method="POST" action="chat.php">
        <input type="text" name="message" placeholder="Tape ton message ici">
        <input type="submit" value="Envoyer">
    </form>
    <h3>Messages :</h3>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $message = htmlspecialchars($_POST["message"]);
            echo "<p>$message</p>";
        }
    ?>
</body>
</html>
