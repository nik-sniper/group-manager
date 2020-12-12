<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GroupManager помагатор в ваших соц сетях</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body class="bg-dark">

<div class="shadow-lg d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark text-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Group Manager</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-white" href="main">Главная</a>
        <a class="p-2 text-white" href="price">Тарифы</a>
        <a class="p-2 text-white" href="#">Наши Услуги</a>
    </nav>
    <a class="btn btn-outline-primary" href="dashboard">Войти</a>
</div>

@yield('main_content')

</body>
</html>
