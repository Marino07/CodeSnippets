<?php
require_once __DIR__ . '/HtmlElement.php';
require_once __DIR__ . '/BaseInput.php';
require_once __DIR__ . '/Form.php';
require_once __DIR__ . '/Button.php';
require_once __DIR__ . '/PasswordInput.php';
require_once __DIR__ . '/TextInput.php';

$form = new Form();
$form->addElement(new TextInput('firstname','First Name'));
$form->addElement(new TextInput('email','Email'));
$form->addElement(new PasswordInput('password','Password'));
$form->addElement(new Button('Submit'));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Title Here</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your stylesheet -->
</head>
<body>
<?php echo $form->render(); ?>
</body>
</html>




