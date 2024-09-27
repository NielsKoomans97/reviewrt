<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="/js/controls.js" type="module" defer></script>
    <link rel="stylesheet" href="build/assets/main.css">
</head>

<body>
    <x-header />
    <div class="content">
        @yield('content')
    </div>
</body>

</html>
