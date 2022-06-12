<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div id="app">
        <p>test vue</p>
        <test-vue></test-vue>
        <example-component></example-component>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
