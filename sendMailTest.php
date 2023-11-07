<?php
require_once 'vendor/autoload.php';
use \Mailjet\Resources;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="scss/style.css" type="text/css" rel="stylesheet">
    <title>Title</title>
</head>
<body>
<main>
    <form action="sendMailTest.php" method="post">
        <button type="submit">Try me!</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

     sendEmail();
    }
    ?>
</main>
</body>
</html>
<?php
function sendEMail(){
    $mj = new \Mailjet\Client('b09f138efabde3f1b27ec2c5f0eac7f0','ff1d23294c5292b4248018a11c6b8149',true,['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => "richardlayla@hotmail.com",
                    'Name' => "layla"
                ],
                'To' => [
                    [
                        'Email' => "richardlayla@hotmail.com",
                        'Name' => "layla"
                    ]
                ],
                'Subject' => "Greetings from Mailjet.",
                'TextPart' => "My first Mailjet email",
                'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
                'CustomID' => "AppGettingStartedTest"
            ]
        ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response->success() && var_dump($response->getData());
}


?>
