<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Hey {{ $user->name}} , Thank you for registering to be an agent with us. To access your account and monitor your verification status kindly click <a href="{{ route('password.reset', ['token'=>$token])}}">here </a> to set your new password.
</body>
</html>
