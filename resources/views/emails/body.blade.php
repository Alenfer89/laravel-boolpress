<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Sender</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>
                    {{ $author }} is contacting us
                </h1>
                <h4>
                    answer to address: {{ $email }}
                </h4>
                <p>
                    {{ $messageContent }}
                </p>
            </div>
        </div>
    </div>
</body>
</html>