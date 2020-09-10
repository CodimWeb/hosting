@extends('layouts.layout')

<!DOCTYPE html>
<html lang="ru">
@section('head')
    @parent
@endsection
<body>
    @section('header')
        @parent
    @endsection

    @section('content')
        <div class="page-header">
            <div class="page-header__container">
                <div class="page-header__left">
                    <div class="page-header__breadcrumb-offset">
                        <div class="breadcrumb">
                            <li>
                                <a href="/">Hosting</a>
                            </li>
                            <li>
                                Reviews
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="agg-reviews__header">
            <h1 class="page-title">Web Hosting - In-Depth Reviews of Web Hosting Companies</h1>
            <span class="page-subtitle">A good hosting service will allow your website to load quickly and reliably every time a user arrives on your
            page. Compare the best hosting platforms &amp; give your site the support it needs to succeed.</span>
        </div>

        <div class="horiz-sep"></div>
        <div class="adv-disc__in-page-container">
            <div class="adv-disc">
                <button class="adv-disc__button"><span>Advertising Disclosure</span></button>
                <div class="adv-disc__container adv-disc__container--hidden adv-disc__container--initial">
                    <div class="adv-disc__content">
                        <div class="adv-disc__title"></div>
                        <div class="adv-disc__text">
                            <p>This site is a free online resource that strives to offer helpful content and comparison features
                                to its visitors. Please be advised that the operator of this site accepts advertising
                                compensation from companies that appear on the site, and such compensation impacts the location
                                and order in which the companies (and/or their products) are presented, and in some cases may
                                also impact the rating that is assigned to them. To the extent that ratings appear on this site,
                                such rating is determined by our subjective opinion and based on a methodology that aggregates
                                our analysis of brand market share and reputation, each brand's conversion rates, compensation
                                paid to us and general consumer interest. Company listings on this page DO NOT imply
                                endorsement. We do not feature all providers on the market. Except as expressly set forth in our
                                <a href="#" target="_blank">Terms of Use</a>, all representations and warranties regarding the
                                information presented on this page are disclaimed. The information, including pricing, which
                                appears on this site is subject to change at any time.</p>
                        </div>
                        <button class="adv-disc__close">
                            <span class="adv-disc__close__label">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="page">
            <div class="page__center">
                <div class="agg-reviews__items">
                    @foreach($hostings as $hosting)
                        <div class="review-row" data-row-index="1">
                            <div class="review-row__mobile">
                                <a href="/hosting/{{ $hosting->id }}" class="nilink" target="_blank">
                                    <img class="review-row__logo" src="{{ asset('/storage/'.$hosting->logo) }}" alt="BlueHost" title="">
                                </a>
                            </div>
                            <div class="review-row__left">
                                <a href="#" class="review-row__title">
                                    <h2>{{ $hosting->hosting_name }}</h2>
                                </a>
{{--                                <div class="review-row__date">08.09.2020</div>--}}
                                <div class="review-row__summary">{{ mb_substr($hosting->admin_voice, 0, 150).'...' }}</div>
                                <div class="review-row__footer-section">
                                    <a href="/hosting/{{ $hosting->id }}" class="review-row__more">Читать отзывы о {{ $hosting->hosting_name }}</a>
                                    <a class="review-row__more-mobile" href="//{{ $hosting->hosting_url }}" target="_blank" sticky="false">Перейти</a>
                                </div>
                            </div>
                            <div class="review-row__right">
                                <a href="/hosting/{{ $hosting->id }}">
                                    <img class="lazy review-row__logo loaded" src="{{ asset('/storage/'.$hosting->logo) }}">
                                </a>
                                <a class="review-row__visit review-row__visit--arrow review-row__spaced_cta" href="//{{ $hosting->hosting_url }}" target="_blank" >
                                    Перейти
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="page__right-sidebar">
                <div class="top5-prods">
                    <div class="top5-prods__title">
                        <span class="top5-prods__title__text">Лучшие хостинги</span>
                        <a href="/" class="top5-prods__title__button">Показать все</a>
                    </div>
                    <div class="top5-prods__items">
                        @foreach($top5 as $hosting)
                            <a href="//{{ $hosting->hosting_url }}" target="_blank" class="top5-prods__item nilink">
                                <div class="top5-prods__item__icon-container">
                                    <div class="top5-prods__item__icon" style="background-image:url({{ asset('/storage/'.$hosting->small_logo) }})">
                                    </div>
                                </div>
                                <div class="top5-prods__item__name">{{ $hosting->hosting_name }}</div>
                                <span class="top5-prods__item__link">
                                    <svg class="top5-prods__item__link__arrow" viewBox="0 0 7 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m18.9166667 10.9166667-3.8333334 3.8333333-3.8333333-3.8333333-1.1666667 1.1666666 5 5 5-5z" fill="#fff" fill-rule="evenodd" transform="matrix(0 1 1 0 -10.916667 -10.083333)"></path>
                                    </svg>
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <div class="top5-prods__button-container">
                        <a href="/" target="_self" rel="noopener noreferrer" class="top5-prods__button" data-role="top-5-products-compare-all">Показать все</a>
                    </div>
                </div>
                <div class="related-articles">
                    <div class="related-articles__header">
                        <h3 class="related-articles__header__title">Последние статьи</h3>
                    </div>
                    <div class="related-articles__items">
                        @foreach($articles as $article)
                            <a href="/article/{{ $article->id }}" class="related-articles__item">
                                <div class="lazy related-articles__item__image lazy" style="background-image: url('{{ asset('/storage/'.$article->image) }}');"></div>
                                <div class="related-articles__item__text-section">
                                    <div class="related-articles__item__title">{{ $article->title }}</div>
                                    <div class="related-articles__item__link">Читать далее</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <a href="/articles" class="related-articles__read-all">Все статьи</a>
                </div>
            </div>
        </div>
    @endsection

    @section('footer')
        @parent
    @endsection

    @section('scripts')
        @parent
    @endsection
</body>
</html>
