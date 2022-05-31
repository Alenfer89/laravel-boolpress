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
                {{-- 
                @ creo il corpo della email che invio all'admin.
                # I dati passano alla funzione build nel modello SendNewMail che ho creato dopo che
                . il modello viene istanziato nel homeController (@emailSender) con i dati presi dal form inseriti dal guest
                --}}
                <h1>
                    {{ $author }} is contacting us
                </h1>
                <h4>
                    please admin, answer to address: {{ $email }}
                </h4>
                <p>
                    {{ $messageContent }}
                </p>
            </div>
        </div>
    </div>
</body>
</html>