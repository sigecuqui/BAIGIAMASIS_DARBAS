<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php print $data['title'] ?></title>

    <?php foreach ($data['css'] as $path) : ?>
        <link rel="stylesheet" href="<?php print $path; ?>">
    <?php endforeach; ?>

    <?php foreach ($data['js'] as $path) : ?>
        <script src="<?php print $path; ?>" defer></script>
    <?php endforeach; ?>

</head>
<body class="index__body">
    <?php print $data['header'] ?>
<main>
    <?php print $data['content']; ?>
</main>
<footer>
    <h4>©2020. Sigita Guogaitė, all rights reserved.</h4>
</footer>
</body>
</html>
