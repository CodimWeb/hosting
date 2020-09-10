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
                    <a class="nav-link" href="/admin/articles">Статьи</a>
                    <a class="nav-link active" href="/admin/comments">Коментарии</a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Коментарии</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="new" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Новые</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="old" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Старые</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="new">
                        @foreach($comments as $comment)
                            @if(!$comment->moderation)
                            <div class="visitors-reviews__card">
                            <div class="visitors-reviews__details">
                                <div class="visitors-reviews__details visitors-reviews__details--visitor">
                                    <img class="visitors-reviews__gender" src="{{asset('assets/img/user.svg')}}" title="">
                                    <div class="visitors-reviews__details visitors-reviews__details--more-info">
                                        <div><span>{{ $comment->user_name }}</span><span>, {{ $comment->user_position }}</span></div>
                                        <span>{{ date("d.m.Y", strtotime($comment->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class="visitor-review-agg">
                                    <div class="visitor-review-agg__overview">
                                        <div class="rating__container--parent">
                                            <div class="rating__container">
                                                <div class="rating__stars">
                                                    @for($i = 1, $half_star = floor($comment->totalRating); $i <= 5; $i++)
                                                        @if($i <= $comment->totalRating)
                                                            <div class="rating__star rating__star--full">
                                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                </svg>
                                                            </div>
                                                        @elseif($i == $half_star + 1 && $comment->totalRating - floor($comment->totalRating) != 0)
                                                            <div class="rating__star">
                                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <g fill-rule="nonzero" fill="none">
                                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                                        <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                        @else
                                                            <div class="rating__star">
                                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                </svg>
                                                            </div>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="visitor-review-action">
                                        <button type="button" class="btn btn-success btn-add-comment" data-id="{{ $comment->id }}">Добавить</button>
                                        <button type="button" class="btn btn-danger btn-delete-comment" data-id="{{ $comment->id }}" >Удалить</button>
                                    </div>
                                </div>
                            </div>
                            <p class="visitors-reviews__details visitors-reviews__details--review">
                                {{ $comment->text }}
                            </p>
                        </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="old">
                        @foreach($comments as $comment)
                            @if($comment->moderation)
                                <div class="visitors-reviews__card">
                                    <div class="visitors-reviews__details">
                                        <div class="visitors-reviews__details visitors-reviews__details--visitor">
                                            <img class="visitors-reviews__gender" src="{{asset('assets/img/user.svg')}}" title="">
                                            <div class="visitors-reviews__details visitors-reviews__details--more-info">
                                                <div><span>{{ $comment->user_name }}</span><span>, {{ $comment->user_position }}</span></div>
                                                <span>{{ date("d.m.Y", strtotime($comment->created_at)) }}</span>
                                            </div>
                                        </div>
                                        <div class="visitor-review-agg">
                                            <div class="visitor-review-agg__overview">
                                                <div class="rating__container--parent">
                                                    <div class="rating__container">
                                                        <div class="rating__stars">
                                                            @for($i = 1, $half_star = floor($comment->totalRating); $i <= 5; $i++)
                                                                @if($i <= $comment->totalRating)
                                                                    <div class="rating__star rating__star--full">
                                                                        <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                        </svg>
                                                                    </div>
                                                                @elseif($i == $half_star + 1 && $comment->totalRating - floor($comment->totalRating) != 0)
                                                                    <div class="rating__star">
                                                                        <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                            <g fill-rule="nonzero" fill="none">
                                                                                <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                                                <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                @else
                                                                    <div class="rating__star">
                                                                        <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                        </svg>
                                                                    </div>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="visitor-review-action">
{{--                                                <button type="button" class="btn btn-success btn-add-comment" data-id="{{ $comment->id }}">Добавить</button>--}}
                                                <button type="button" class="btn btn-danger btn-delete-comment" data-id="{{ $comment->id }}" >Удалить</button>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="visitors-reviews__details visitors-reviews__details--review">
                                        {{ $comment->text }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
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
