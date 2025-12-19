<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Images</title>
    <link rel="stylesheet" href="<?= base_url('path_to_your_css_file/style.css') ?>">
</head>

<body>
    <h2>Generated Images</h2>
    <div class="img-container">
        <?php foreach ($images['data'] as $imageData): ?>
            <img src="<?= 'data:image/jpeg;base64,' . $imageData['b64_json'] ?>" alt="Generated Image">
        <?php endforeach; ?>
    </div>
</body>

</html>