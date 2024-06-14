<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>
        Ciao amministratore,<br />

        E' stato creato un nuovo post con titolo: {{ $post->title }}.<br />

        Puoi trovare il post a <a href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">questo link</a>.<br />

        Arrivederci.
    </p>
</body>
</html>