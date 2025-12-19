<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Basic Usage of DALL-E 2 Image Creation Model of OpenAI</h2>
    <div class="container">
        <div class="user-action">
            <form method="post" action="<?= base_url('openai/generateImages') ?>">
                <input type="text" name="prompt" required>
                <input type="text">
                <input type="text">
                <button type="submit">Get Images</button>
            </form>
        </div>
        <div class="img-container">
        </div>
    </div>
     <script>
        const input = document.querySelectorAll('input')
        const button = document.querySelector('button')
        const imgContainer = document.querySelector('.img-container')
        button.onclick = () => {
            if (input[0].value) {
                var http = new XMLHttpRequest();
                var data = new FormData()
                data.append('prompt', input[0].value + input[1].value + input[2].value)
                http.open('POST', 'request.php', true)
                http.send(data)
                http.onload = () => {
                    imgContainer.innerHTML = ''
                    var response = JSON.parse(http.response).data
                    response.forEach(e => {
                        console.log(e);
                        var img = document.createElement('img')
                        img.src = 'data:image/jpeg;base64,' + e.b64_json
                        imgContainer.appendChild(img)
                    });
                }
            }
        }
    </script>
</body>
</html>
