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
                    <a class="nav-link" href="/admin/hostings">Хостинги</a>
                    <a class="nav-link active" href="/admin/articles">Статьи</a>
                    <a class="nav-link" href="/admin/comments">Коментарии</a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Статьи</h1>
                <div class="row">
                    <div class="col-12">
                        <a href="/admin/articles/add" class="btn btn-primary">Добавить статью</a>
                    </div>
                    <div class="col-10">
                        <div class="agg-articles__items">
                            @foreach($articles as $article)
                                <div class="agg-articles__item">
                                    <div class="agg-articles__item__left">
                                        <h2 class="agg-articles__item__title">{{ $article->title }}</h2>
                                        <div class="agg-articles__item__summary">{{ $article->description }}</div>
                                        <div class="agg-articles__item__date">{{ date("d.m.Y", strtotime($article->created_at)) }}</div>
                                    </div>
                                    <div class="agg-articles__item__right">
                                        <div class="agg-articles__item__image">
                                            <img class="agg-articles__item__image__bg" src="{{ asset('/storage/'.$article->image) }}">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-delete-article" data-id="{{ $article->id }}" style="margin-left: 40px;">Удалить</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/control/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
</body>
</html>
