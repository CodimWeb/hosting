<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="{{ asset('css/control/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <span class="navbar-brand">Start Bootstrap</span>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav mt-4">
                    <a class="nav-link" href="/admin">Главная</a>
                    <a class="nav-link active" href="/admin/hostings">Хостинги</a>
                    <a class="nav-link" href="/admin/articles">Статьи</a>
                    <a class="nav-link" href="/admin/comments">Коментарии</a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Добавление хостинга</h1>
                <div class="row">
                    <div class="col">
                        <form action="{{ route('admin.hosting.create') }}" method="post" class="mt-4" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Имя хостинга</label>
                                        <input name="hosting-name" type="text" class="form-control" placeholder="Имя хостинга">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ссылка на сайт хостинга</label>
                                        <input name="hosting-url" type="text" class="form-control" placeholder="Ссылка">
                                    </div>
                                    <div class="form-group">
                                        <p>Тип хостинга</p>
                                        <div class="d-flex">
                                            <div class="mr-4">
                                                <input type="checkbox" name="filter[]" class="mr-1" value="1">
                                                <label for="">VPS/VDS</label>
                                            </div>
                                            <div class="mr-4">
                                                <input type="checkbox" name="filter[]" class="mr-1" value="2">
                                                <label for="">Тестовый период</label>
                                            </div>
                                            <div class="mr-4">
                                                <input type="checkbox" name="filter[]" class="mr-1" value="3">
                                                <label for="">Конструктор</label>
                                            </div>
                                            <div class="mr-4">
                                                <input type="checkbox" name="filter[]" class="mr-1" value="4">
                                                <label for="">Для битрикс</label>
                                            </div>
                                            <div class="mr-4">
                                                <input type="checkbox" name="filter[]" class="mr-1" value="5">
                                                <label for="">Для wordpress</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Логотип хостинга</label>
                                        <input name="hosting-image" type="file" class="form-control" placeholder="Логотип хостинга">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Маленький логотип хостинга</label>
                                        <input name="hosting-image-small" type="file" class="form-control" placeholder="Маленький логотип хостинга">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Краткое описание хостинга</label>
                                        <textarea name="admin-voice" class="form-control" id="" cols="30" rows="6" placeholder="Краткое описание хостинга"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Зеленая надпись на карточке хостинга цена/экономия</label>
                                        <input name="price" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <p>Плюсы</p>
                                    <div class="plus-container">
{{--                                        <div class="form-group">--}}
{{--                                            <input name="hosting_plus[]" type="text" class="form-control" placeholder="Плюс">--}}
{{--                                        </div>--}}
                                    </div>
                                    <button type="button" class="btn btn-primary btn-add-plus">Добавить плюс</button>
                                </div>
                                <div class="col-6">
                                    <p>Минусы</p>
                                    <div class="minus-container">
{{--                                        <div class="form-group">--}}
{{--                                            <input name="hosting_minus[]" type="text" class="form-control" placeholder="Минус">--}}
{{--                                        </div>--}}
                                    </div>
                                    <button type="button" class="btn btn-primary btn-add-minus">Добавить минус</button>
                                </div>
                                <div class="col-12">
                                    <div class="">
                                        <div class="infoblocks mt-4">
{{--                                            <div class="infoblock mb-4">--}}
{{--                                                <input type="text" name="title[]" class="form-control mb-4 mt-4">--}}
{{--                                                <textarea id="summernote" class="summernote" name="mediadata[]"></textarea>--}}
{{--                                            </div>--}}
                                        </div>
                                        <button type="button" class="btn btn-primary add-infoblock">Добавить инфоблок</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-4 mb-4">
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/control/scripts.js') }}"></script>
</body>
</html>
