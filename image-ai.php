<?php 
require __DIR__.'/vendor/autoload.php'; 

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = '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';

$open_ai = new OpenAi($open_ai_key);

$prompt = $_POST['prompt'];


$complete = $open_ai->image(
    [
        "prompt" => $prompt,
        "n" => 1,
        "size" => "256x256",
        "response_format" => "url",
     ]
);



$response = json_decode($complete, true);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Here is your image generated by AI</h1>
    </div>
    <div>
        <img src="<?= $response["data"][0]["url"]?>" />
    </div>
</body>
</html>
