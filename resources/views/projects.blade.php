<!DOCTYPE html>
<html>

<head>
    <title>Creat a Project</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>
    <form method="POST" action='/projects'>
        @csrf

        <input type='text' placeholder="Project Name" name='title'>
        <textarea type="text" placeholder="describe it yo"></textarea>
        <button type="submit">Press</button>
    </form>
    <script src="/js/app.js"></script>
</body>

</html> 