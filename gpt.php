<!DOCTYPE html>
<html>
<head>
    <title>Chat avec ChatGPT</title>
</head>
<body>
    <h2>ChatGPT</h2>
    <form method="POST" action="gpt.php">
        <input type="text" name="question" placeholder="Pose une question à ChatGPT">
        <input type="submit" value="Envoyer">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $question = $_POST["question"];
        $apiKey = "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"; // Mets ta clé API ici

        $data = [
            "model" => "gpt-3.5-turbo",
            "messages" => [["role" => "user", "content" => $question]]
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n" .
                            "Authorization: Bearer " . $apiKey,
                "method" => "POST",
                "content" => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        $result = file_get_contents("https://api.openai.com/v1/chat/completions", false, $context);
        $response = json_decode($result, true);
        $reply = $response["choices"][0]["message"]["content"];

        echo "<p><strong>Réponse de ChatGPT :</strong> $reply</p>";
    }
    ?>
</body>
</html>
