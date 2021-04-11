<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <title>Cover manager</title>
</head>
<body>
    <!-- Portada -->
    <div class="cover-background" style="<?= $background_style ?>">
        <div class="container">
            <?php require $cover ?>
        </div>
    </div>
    <!-- /Portada -->
</body>
</html>