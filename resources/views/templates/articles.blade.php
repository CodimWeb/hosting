@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">
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
                                <a href="/">Хостинг</a>
                            </li>
                            <li>
                                Статьи
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="agg-reviews__header">
            <h1 class="page-title">Web Hosting Guides</h1>
            <span class="page-subtitle">A good web hosting service will keep your site running smoothly 24/7. Read up on our in-depth website hosting articles & find out what our experts recommend to take your site to the next level.</span>
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
                <div class="agg-articles__items">
                    @foreach($articles as $article)
                        <a href="/article/{{ $article->id }}" class="agg-articles__item">
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
                        </a>
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
