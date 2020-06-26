<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <?= getMenu() ?>
    <p style="color: red;"><?= $msg ?></p>

    <?= $content ?>

</body>
</html>