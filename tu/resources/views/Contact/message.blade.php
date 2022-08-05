<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"/>

    <title>Contato</title>
</head>
<body>

    <div style=" font-family: 'Poppins', sans-serife; width: 550px; background:#B9AAEB; color:#ffffff; padding: 20px; border-radius: 10px;">
    <h1 style="text-align:center; font-size: 30px; padding-top:20px;">Mensagem De Contato</h1>
        <p style="text-align: center; padding-bottom: 50px;">
        {{$data['menssage']}}
        </p>
        <span style="text-align:center; padding-top: 20px;">{{$data['name']}}</span><br>
        <span style="text-align:center;">{{$data['email']}}</span>
    </div>

</body>
</html> 