<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Post Notification</title>
</head>
<body>
    <h1>There is a new post!</h1>

    <h4><a href="http://127.0.0.1:8000/posts/{{$new_post->slug}}">Click here</a></h4>

    <h4>Details:</h4>
    <ul>
        <li><h5>Title: </h5>{{$new_post->title}}</li>
        <li><h5>Slug: </h5>{{$new_post->slug}}</li>
    </ul>
</body>
</html>