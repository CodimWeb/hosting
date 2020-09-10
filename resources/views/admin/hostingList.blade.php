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
                <h1 class="mt-4">Хостинги</h1>
                <div class="row">
                    <div class="col">
                        <a href="/admin/hosting/add" class="btn btn-primary">Добавить хостинг</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 mt-5">
                        @for($i = 0, $index = 0; $i < count($hostings); $i++)
                            <div class="d-flex align-items-start">
                                <div class="chart-product-text nilink  ribbon_primary flex-grow-1 flex-shrink-1" >
                                <div class="chart-product-text-body null" data-role="chart-product-body">
                                    <div class="product-row  has-ribbon">
                                        <div class="left">
{{--                                            <div class="product-ribbon">--}}
{{--                                                <span class="product-ribbon__text">Самый популярный</span>--}}
{{--                                            </div>--}}
                                            <div class="left__info">
                                                <div class="index-counter">
                                                    <div class="index-counter__value">
                                                        {{++$index}}
                                                    </div>
                                                    <div class="index-counter__border"></div>
                                                </div>
                                            </div>
                                            <div class="left__container">
                                                <div class="logo__container">
                                                    <div>
                                                        <img class="logo__image" src="{{asset('/storage/'.$hostings[$i]->logo)}}" alt="" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="before-center"></div>
                                        <div class="center">
                                            <div class="center__header"></div>
                                            <div class="bottom-line">
                                                <span class="bottom-line__product-name">{{ $hostings[$i]->hosting_name }}</span>
                                                {{--                                                        <span class="bottom-line__content">Powers 2M+ websites worldwide</span>--}}
                                                <a class="review-link" href="/hosting/{{ $hostings[$i]->id }}" title="Читать отзывы">Читать отзывы</a>
                                            </div>
                                            <ul class="attributes">
                                                @foreach($hostings[$i]->advanteges as $advantege)
                                                    <li title="Free domain and site builder">
                                                        <div class="">{{ $advantege->text }}</div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="addon__sale-badge">
                                                <svg class="addon__sale-badge__icon" id="flame-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 205.000000 274.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,274.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M928 2693 c12 -28 16 -66 16 -143 0 -88 -4 -116 -26 -172 -47 -125 -85 -175 -278 -368 -264 -264 -384 -419 -494 -638 -215 -429 -174 -787 122 -1079 82 -80 240 -192 354 -249 l70 -35 -27 43 c-52 85 -103 194 -130 278 -39 120 -46 289 -17 387 24 79 77 171 130 227 39 40 149 126 162 126 4 0 -4 -28 -19 -62 -23 -57 -26 -75 -26 -193 1 -144 11 -183 80 -291 40 -62 163 -186 179 -181 24 8 129 146 163 215 30 59 37 85 37 134 l1 60 50 -54 c103 -110 164 -275 150 -408 -8 -75 -36 -166 -71 -229 -13 -24 -23 -46 -21 -48 6 -5 144 45 202 74 103 51 214 134 297 222 237 249 278 581 122 983 l-29 73 -6 -91 c-14 -192 -77 -342 -196 -463 -40 -41 -75 -73 -77 -70 -3 3 5 32 19 64 68 169 104 352 112 560 8 247 -31 434 -137 652 -127 260 -330 472 -630 658 -49 30 -92 55 -94 55 -3 0 3 -17 12 -37z"></path></g></svg>
                                                <span class="addon__sale-badge__text">{{ $hostings[$i]->price }}</span>
                                            </div>
                                            <div class="center__mobile--footer">
                                                <a class="cta-button cta-yellow nilink" href="/visit?product_id=150&amp;url=https%3A%2F%2Fwww.bluehost.com%2Ftrack%2Fnaturalcpa%2Fsid%3DNI_%5Btracking-subid%5D&amp;cms_platform=xsite&amp;d=www.top10bestwebsitehosting.com&amp;rank=1&amp;bi=%7B%22p%22%3A150%2C%22site_id%22%3A%2215%22%2C%22curi%22%3A%22%22%2C%22blrs%22%3A55294%2C%22plv%22%3A%225f2c02280d48b47a5c991ef1%22%2C%22sv%22%3A%225e9eb8133d3d2fc068a46614%22%2C%22vv%22%3A%225efc9354beedbb3654a3e4ea%22%2C%22refdomain%22%3A%22com%22%2C%22verticalId%22%3A%225e81f9c493454a3cb4fe723e%22%2C%22segmentId%22%3A%225e81fa4d93454a4e3ffe725a%22%2C%22rank%22%3A1%7D&amp;comp_iid=db4bd88c-75fe-43e1-8461-6634a28616a7&amp;uid=QQQEpO3sMzMZfW543nxs&amp;riid=qfa6bRRna62XTV787hjr&amp;gid=125528425.1597229251" target="_blank" title="Visit Site">
                                                    <span class="cta-button__text">{{ $hostings[$i]->hosting_url }}</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="after-center"></div>
                                        <div class="right">
                                            <div class="product-score trophy-score">
                                                @if(intval($hostings[$i]->rating * 20) > 96 && intval($hostings[$i]->rating * 20) <= 100)
                                                    <div class="product-score__text">Великолепно!</div>
                                                @elseif(intval($hostings[$i]->rating * 20) > 90 && intval($hostings[$i]->rating * 20) <= 96)
                                                    <div class="product-score__text">Отлично</div>
                                                @elseif(intval($hostings[$i]->rating * 20) > 80 && intval($hostings[$i]->rating * 20) < 90)
                                                    <div class="product-score__text">Хорошо</div>
                                                @else
                                                    <div class="product-score__text">средне</div>
                                                @endif()
                                                <div class="product-score__number">
                                                    @if($i == 0)
                                                        <span class="chart-product__trophy">
                                                            <svg class="trophy-icon" id="big-trophy-icon" viewBox="0 0 67 65" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Reviews---need-to-solve" stroke="none" stroke-width="1"><path d="M53.95694,6.25 C54.16397,4.168 54.16397,2.293 54.16397,0 L12.49997,0 C12.49997,2.293 12.49997,4.168 12.707,6.25 L0,6.25 L0,8.332 C0,26.875 23.543,40 29.168,42.914 L29.164093,49.9999 C29.164093,53.5429 26.457093,56.2499 22.914093,56.2499 L18.746093,56.2499 L18.746093,64.5819 L47.914093,64.5819 L47.914093,56.2499 L43.746093,56.2499 C40.203093,56.2499 37.496093,53.5429 37.496093,49.9999 L37.496093,42.9179 C43.121093,39.9999 66.664093,26.8749 66.664093,8.3359 L66.664093,6.2539 L53.95694,6.25 Z M4.37494,10.418 L13.12494,10.418 C13.95697,19.793 16.24994,26.461 18.74994,31.25 C12.08194,26.043 5.20694,18.75 4.37494,10.418 Z M48.12494,31.25 C50.62494,26.457 52.91794,19.793 53.74994,10.418 L62.49994,10.418 C61.45694,18.75 54.58194,26.043 48.12494,31.25 Z" id="Shape"></path></g></svg>
                                                        </span>
                                                    @endif
                                                    <span>{{ intval($hostings[$i]->rating * 20) / 10 }}</span>
                                                </div>
                                            </div>
                                            <div class="right__container">
                                                <div class="right__CTA-container">
                                                    <a class="cta-button cta-yellow nilink"
                                                       href="//{{$hostings[$i]->hosting_url }}"
                                                       target="_blank"
                                                       title="Visit Site">
                                                        <span class="cta-button__text" >Перейти</span>
                                                    </a>
                                                </div>
                                                <div class="addon__sale-badge">
                                                    @if($hostings[$i]->price)
                                                        <svg class="addon__sale-badge__icon" id="flame-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 205.000000 274.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,274.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M928 2693 c12 -28 16 -66 16 -143 0 -88 -4 -116 -26 -172 -47 -125 -85 -175 -278 -368 -264 -264 -384 -419 -494 -638 -215 -429 -174 -787 122 -1079 82 -80 240 -192 354 -249 l70 -35 -27 43 c-52 85 -103 194 -130 278 -39 120 -46 289 -17 387 24 79 77 171 130 227 39 40 149 126 162 126 4 0 -4 -28 -19 -62 -23 -57 -26 -75 -26 -193 1 -144 11 -183 80 -291 40 -62 163 -186 179 -181 24 8 129 146 163 215 30 59 37 85 37 134 l1 60 50 -54 c103 -110 164 -275 150 -408 -8 -75 -36 -166 -71 -229 -13 -24 -23 -46 -21 -48 6 -5 144 45 202 74 103 51 214 134 297 222 237 249 278 581 122 983 l-29 73 -6 -91 c-14 -192 -77 -342 -196 -463 -40 -41 -75 -73 -77 -70 -3 3 5 32 19 64 68 169 104 352 112 560 8 247 -31 434 -137 652 -127 260 -330 472 -630 658 -49 30 -92 55 -94 55 -3 0 3 -17 12 -37z"></path></g></svg>
                                                        <span class="addon__sale-badge__text">{{ $hostings[$i]->price }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <button class="btn btn-danger btn-delete-hosting ml-4" data-id="{{ $hostings[$i]->id }}">Удалить</button>
                            </div>
                        @endfor
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
