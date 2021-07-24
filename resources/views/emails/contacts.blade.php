<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Message received from:
            <span>{{$data['full_name']}}</span>
        </h1>
        <p>Sender:
            <span>{{$data['email']}}</span>
        </p>
        <p>Message: 
            <span>{{$data['message']}}</span>
        </p>
    </body>
    </div>
</html>