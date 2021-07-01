<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Contact Admin Notification</title>
</head>
<body>
    <h1>Hello Administrator</h1>

    <h4>There is a new contact:</h4>

    <ul>
        <li><h5>Name: </h5>{{$form_data['name']}}</li>
        <li><h5>Email: </h5>{{$form_data['email']}}</li>
        <li><h5>Message: </h5>{{$form_data['message']}}</li>
    </ul>
</body>
</html>