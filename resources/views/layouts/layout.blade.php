<!DOCTYPE html>
<html lang="ru">

@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>
@show
<body>
@section('header')
    <div class="header">
        <div class="header__content">
            <div class="header__content__left">
                <a href="/" class="header__logo__link">
                    <img class="header__logo" src="{{ asset('assets/img/logo.svg') }} " alt="" title="">
                </a>
            </div>
            <div class="header__content__right">
                <nav class="nav-group nav-group-single-vertical" data-navgroup="true" data-active="false">
                    <svg  viewBox="0 0 18 12" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 12h18v-2H0v2zm0-5h18V5H0v2zm0-7v2h18V0H0z" fill="#000" fill-rule="evenodd"></path>
                    </svg>
                </nav>
            </div>
        </div>
        <div class="header-overlay"></div>
        <div class="header__second-row">
            <div class="header__second-row__left">
                <div class="navmenu {{ $param == 'top' ? 'navmenu__bottom' : '' }}">
                    <a href="/" class="navmenu__default navmenu__display-name">Топ 10</a>
                </div>
                <div class="navmenu {{ $param == 'type' ? 'navmenu__bottom' : '' }}">
                    <a href="/home/type" class="navmenu__default navmenu__display-name">VPS/VDS</a>
                </div>
                <div class="navmenu {{ $param == 'free' ? 'navmenu__bottom' : '' }}">
                    <a href="/home/free" class="navmenu__default navmenu__display-name">Тестовый период</a>
                </div>
                <div class="navmenu {{ $param == 'constructor' ? 'navmenu__bottom' : '' }}">
                    <a href="/home/constructor" class="navmenu__default navmenu__display-name">Конструктор</a>
                </div>
                <div class="navmenu {{ $param == 'bitrix' ? 'navmenu__bottom' : '' }}">
                    <a href="/home/bitrix" class="navmenu__default navmenu__display-name">Для Битрикс</a>
                </div>
                <div class="navmenu {{ $param == 'wordpress' ? 'navmenu__bottom' : '' }}">
                    <a href="/home/wordpress" class="navmenu__default navmenu__display-name">Для Wordpress</a>
                </div>
                <div class="mobile--dd-space-element"></div>
            </div>
            <div class="header__second-row__right">
                <div class="navmenu" >
                    <a href="/reviews" class="navmenu__default navmenu__display-name {{ $param == 'reviews' ? 'navmenu__bottom' : '' }}">Отзывы</a></div>
                <div class="navmenu">
                    <a href="/articles" class="navmenu__default navmenu__display-name {{ $param == 'article' ? 'navmenu__bottom' : '' }}">Статьи</a>
                </div>
            </div>
        </div>
    </div>
@show

@section('content')
    content
@show

@section('footer')
    <div class="footer-wrap">
        <footer class="footer">
            <div class="footer__container">
                <div class="footer__column">
                    <div class="footer__logo">
                        <a href="/" class="footer__logo__link">
                            <svg class="footer__logo__image" id="ninja-top10-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 133 35"><g fill="inherit" fill-rule="inherit"><g transform="translate(2.202 .162)"><path d="M10.313 2.665c3.649 0 6.12.606 7.132 1.087-1.013.48-3.483 1.087-7.132 1.087-3.648 0-6.119-.607-7.131-1.087 1.012-.48 3.483-1.087 7.131-1.087m0 4.78c2.464 0 4.796-.265 6.566-.746 2.348-.636 3.538-1.628 3.538-2.947C20.417.238 12 .06 10.313.06 7.85.06 5.518.324 3.747.804 1.4 1.441.21 2.434.21 3.752c0 3.514 8.417 3.692 10.104 3.692" fill="inherit"></path></g><g transform="translate(0 9.022)"><path d="M16.31 20.242H9.327c-3.916 0-7.101-3.205-7.101-7.144s3.185-7.144 7.1-7.144h6.984c3.916 0 7.101 3.205 7.101 7.144 0 3.94-3.185 7.144-7.1 7.144M12.818.127C5.739.127-.001 5.9-.001 13.022s5.74 12.896 12.82 12.896 12.818-5.774 12.818-12.896C25.637 5.9 19.898.127 12.82.127" fill="inherit"></path></g><path d="M17.03 22.33a1.296 1.296 0 0 1-1.293-1.3c0-.718.578-1.3 1.292-1.3.714 0 1.293.582 1.293 1.3 0 .719-.579 1.3-1.293 1.3m-8.421 0a1.296 1.296 0 0 1-1.293-1.3c0-.718.579-1.3 1.293-1.3s1.293.582 1.293 1.3c0 .719-.579 1.3-1.293 1.3m7.702-4.748H9.327c-2.488 0-4.511 2.036-4.511 4.539 0 2.502 2.023 4.538 4.51 4.538h6.984c2.488 0 4.512-2.036 4.512-4.538 0-2.503-2.024-4.539-4.512-4.539M43.626 14.97h-10.76v2.866h3.844v11.399h3.133V17.836h3.783zM48.589 26.779c-1.505 0-2.665-1.187-2.665-2.702 0-1.493 1.16-2.7 2.665-2.7 1.485 0 2.664 1.207 2.664 2.7 0 1.515-1.18 2.702-2.664 2.702m0-8.166c-3.174 0-5.696 2.415-5.696 5.464 0 3.05 2.522 5.464 5.696 5.464 3.153 0 5.696-2.415 5.696-5.464 0-3.049-2.543-5.464-5.696-5.464M61.403 26.656c-1.485 0-2.685-1.126-2.685-2.579 0-1.452 1.2-2.578 2.685-2.578 1.464 0 2.604 1.126 2.604 2.578 0 1.453-1.14 2.579-2.604 2.579m.55-7.92c-1.567 0-2.767.655-3.052 1.535v-1.35H55.87v14.263H58.9v-5.3c.285.9 1.485 1.535 3.051 1.535 2.91 0 5.086-2.374 5.086-5.342 0-2.987-2.177-5.34-5.086-5.34M67.646 17.836h2.075v11.398h3.133V14.971h-5.208zM82.557 26.656c-2.503 0-4.435-1.965-4.435-4.523 0-2.496 1.932-4.522 4.435-4.522 2.501 0 4.434 2.046 4.434 4.522 0 2.517-1.953 4.523-4.434 4.523m0-11.91c-4.191 0-7.568 3.254-7.568 7.387 0 4.155 3.377 7.388 7.568 7.388 4.21 0 7.567-3.233 7.567-7.388 0-4.133-3.357-7.387-7.567-7.387M91.79 26.104c-.895 0-1.668.736-1.668 1.657 0 .92.773 1.658 1.668 1.658.895 0 1.668-.737 1.668-1.658 0-.92-.773-1.657-1.668-1.657M99.58 21.356c1.058 0 1.73.389 2.36 1.064l1.912-1.903c-1.302-1.433-2.746-1.924-4.272-1.924-3.132 0-5.655 2.313-5.655 5.464 0 3.152 2.523 5.443 5.655 5.443 1.526 0 2.97-.49 4.272-1.923l-1.912-1.903c-.63.675-1.302 1.064-2.36 1.064-1.464 0-2.624-1.126-2.624-2.681 0-1.576 1.16-2.701 2.624-2.701M110.177 26.779c-1.505 0-2.664-1.187-2.664-2.702 0-1.493 1.16-2.7 2.664-2.7 1.485 0 2.665 1.207 2.665 2.7 0 1.515-1.18 2.702-2.665 2.702m0-8.166c-3.173 0-5.695 2.415-5.695 5.464 0 3.05 2.522 5.464 5.695 5.464 3.153 0 5.696-2.415 5.696-5.464 0-3.049-2.543-5.464-5.696-5.464M129.359 18.695c-1.445 0-2.747.348-3.418 1.638-.467-1.065-1.383-1.638-2.787-1.638-1.26 0-2.278.614-2.664 1.515v-1.29h-3.031v10.314h3.03v-5.791c0-1.208.713-2.046 1.689-2.046.997 0 1.526.757 1.526 1.944v5.893h3.03v-5.791c0-1.208.713-2.046 1.71-2.046.996 0 1.525.757 1.525 1.944v5.893H133v-6.262c0-2.66-1.3-4.277-3.64-4.277" fill="inherit"></path></g></svg>
                        </a>
                    </div>
                </div>
                <div class="footer__column">
                    <div class="footer__row">
                        <div class="footer__column footer__column--left">
                            <!-- <ul class="footer__menu">
                                <li class="footer__menu__item">
                                    <a href="https://www.top10.com/blog" class="footer__menu__item__link">Blog</a>
                                </li>
                                <li class="footer__menu__item">
                                    <a href="https://www.top10.com/deals" class="footer__menu__item__link">Deals</a>
                                </li>
                            </ul> -->
                            <div class="footer__copyright">Copyright © 2009-2020 Natural Intelligence Ltd. All Rights Reserved.</div>
                            <div class="footer__menu footer__menu--regulation">
                                <span class="footer__menu__item__link">Don't Sell My Personal Information</span>
                            </div>
{{--                            <div class="footer__social-media-icons--container">--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li class="btn-facebook social-share__button" data-value="https://www.facebook.com/Top10comMain">--}}
{{--                                        <a href="#">--}}
{{--                                            <svg class="social-share__icon" id="facebook" viewBox="0 0 9 20" xmlns="http://www.w3.org/2000/svg"><path class="facebook__bg" d="M8.583 3.456V.013L5.717 0C2.262 0 1.723 2.575 1.723 4.223V6.28H.11v4.035h1.614V20h4.439v-9.684h2.553l.303-4.035H6.162V4.432c0-.784.178-.976.546-.976h1.875z" fill="inherit" fill-rule="evenodd"></path></svg>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="btn-facebook social-share__button" data-value="https://www.facebook.com/Top10comMain">--}}
{{--                                        <a href="#">--}}
{{--                                            <svg class="social-share__icon" id="twitter" viewBox="0 0 25 20" xmlns="http://www.w3.org/2000/svg"><path d="M7.889 19.723c6.72 0 12.717-5.02 13.74-11.72.109-.71-.101-2.065.227-2.642.213-.374.92-.743 1.24-1.068.411-.42.786-.876 1.116-1.363a9.847 9.847 0 0 1-2.806.756 4.836 4.836 0 0 0 2.15-2.66c-.14.428-1.904.865-2.305.977-.958.27-1.071-.185-1.87-.64-1.583-.902-3.577-.839-5.122.116-1.695 1.048-2.5 3.133-2.128 5.077-3.692.309-7.825-2.276-10.082-5.002.003.004-.585 1.498-.616 1.703a4.795 4.795 0 0 0 .393 2.749c.225.482 1.053 1.948 1.685 1.968-.8-.024-2.273-.24-2.273-.6v.06c0 1.123.482 2.226 1.208 3.075.61.711 1.763 1.796 2.788 1.65-.226.059-2.065.388-2.169.072.654 1.994 2.43 2.669 4.237 3.316-1.394 1.048-2.606 1.754-4.366 1.985-.606.079-2.002.367-2.536.03a14.005 14.005 0 0 0 7.489 2.161z" fill="inherit" fill-rule="evenodd"></path></svg>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="btn-facebook social-share__button" data-value="https://www.facebook.com/Top10comMain">--}}
{{--                                        <a href="">--}}
{{--                                            <svg class="social-share__icon" id="instagram" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M16 2.881c4.275 0 4.781.019 6.462.094 1.563.069 2.406.331 2.969.55a4.952 4.952 0 0 1 1.837 1.194 5.015 5.015 0 0 1 1.2 1.838c.219.563.481 1.412.55 2.969.075 1.688.094 2.194.094 6.463s-.019 4.781-.094 6.463c-.069 1.563-.331 2.406-.55 2.969a4.94 4.94 0 0 1-1.194 1.837 5.02 5.02 0 0 1-1.837 1.2c-.563.219-1.413.481-2.969.55-1.688.075-2.194.094-6.463.094s-4.781-.019-6.463-.094c-1.563-.069-2.406-.331-2.969-.55a4.952 4.952 0 0 1-1.838-1.194 5.02 5.02 0 0 1-1.2-1.837c-.219-.563-.481-1.413-.55-2.969-.075-1.688-.094-2.194-.094-6.463s.019-4.781.094-6.463c.069-1.563.331-2.406.55-2.969a4.964 4.964 0 0 1 1.194-1.838 5.015 5.015 0 0 1 1.838-1.2c.563-.219 1.412-.481 2.969-.55 1.681-.075 2.188-.094 6.463-.094zM16 0c-4.344 0-4.887.019-6.594.094-1.7.075-2.869.35-3.881.744-1.056.412-1.95.956-2.837 1.85a7.833 7.833 0 0 0-1.85 2.831C.444 6.538.169 7.7.094 9.4.019 11.113 0 11.656 0 16s.019 4.887.094 6.594c.075 1.7.35 2.869.744 3.881.413 1.056.956 1.95 1.85 2.837a7.82 7.82 0 0 0 2.831 1.844c1.019.394 2.181.669 3.881.744 1.706.075 2.25.094 6.594.094s4.888-.019 6.594-.094c1.7-.075 2.869-.35 3.881-.744 1.05-.406 1.944-.956 2.831-1.844s1.438-1.781 1.844-2.831c.394-1.019.669-2.181.744-3.881.075-1.706.094-2.25.094-6.594s-.019-4.887-.094-6.594c-.075-1.7-.35-2.869-.744-3.881a7.506 7.506 0 0 0-1.831-2.844A7.82 7.82 0 0 0 26.482.843C25.463.449 24.301.174 22.601.099c-1.712-.081-2.256-.1-6.6-.1z"></path><path d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219A8.221 8.221 0 0 0 16 7.781zm0 13.55a5.331 5.331 0 1 1 0-10.663 5.331 5.331 0 0 1 0 10.663zM26.462 7.456a1.919 1.919 0 1 1-3.838 0 1.919 1.919 0 0 1 3.838 0z"></path></svg>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                        <div class="footer__column footer__column--right">
                            <ul class="footer__menu">
                                <li class="footer__menu__item">
                                    <a href="https://www.top10.com/about-us" class="footer__menu__item__link">About Us</a>
                                </li>
                                <li class="footer__menu__item">
                                    <a href="https://www.naturalint-top10.com/cookie" class="footer__menu__item__link">Cookie Policy</a>
                                </li>
                                <li class="footer__menu__item">
                                    <a href="https://www.naturalint-top10.com/terms-of-use" class="footer__menu__item__link">Terms of Use</a>
                                </li>
                                <li class="footer__menu__item">
                                    <a href="https://www.naturalint-top10.com/privacy-policy" class="footer__menu__item__link">Privacy Policy</a>
                                </li>
                                <li class="footer__menu__item">
                                    <a href="https://www.top10.com/partner-with-us" class="footer__menu__item__link">Partner With Us</a>
                                </li>
                                <li class="footer__menu__item">
                                    <a href="mailto:contact@top10.com" target="_self" class="footer__menu__item__link">Contact</a>
                                </li>
                            </ul>
                            <div class="footer__vision">
                                <div class="footer__vision__text">
                                    <p>Designed to help users make confident decisions online, this website contains information
                                        about a wide range of products and services. Certain details, including but not limited
                                        to prices and special offers, are provided to us directly from our partners and are
                                        dynamic and subject to change at any time without prior notice. Though based on
                                        meticulous research, the information we share does not constitute legal or professional
                                        advice or forecast, and should not be treated as such.
                                    </p>
                                    <p>Reproduction in whole or in part is strictly prohibited.</p>
                                    <p>As an Amazon Associate we earn from qualifying purchases.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@show
@section('scripts')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
@show
</body>
</html>
