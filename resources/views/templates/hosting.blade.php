@extends('layouts.layout')
<!DOCTYPE html>
<html lang="ru">
@section('head')
    @parent
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <a href="/reviews">Отзывы</a>
                            </li>
                            <li>
                                <span>обзор {{ $hosting->hosting_name }}</span>
                            </li>
                        </div>
                    </div>
                </div>
                <div class="page-header__right">
                    <div class="adv-disc">
                        <button class="adv-disc__button">
                            <span>Advertising Disclosure</span>
                        </button>
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
                                        <a href="https://www.naturalint-top10.com/terms-of-use" target="_blank">Terms of Use</a>, all representations and warranties regarding the
                                        information presented on this page are disclaimed. The information, including pricing, which
                                        appears on this site is subject to change at any time.
                                    </p>
                                </div>
                                <button class="adv-disc__close">
                                    <span class="adv-disc__close__label">Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page">
            <div class="page__left-sidebar">
                <div class="toc">
                    <span class="toc__title">Jump to:</span>
                    <div class="toc__items-container">
                        <ul class="toc__items" data-role="toc-items">

                            @foreach($hosting->infoblocks as $key => $infoblock)
                                @if($infoblock->title)
                                    @if($key == 0)
                                        <li class="toc__item"><a class="smooth active" href="#smooth-{{++$key}}">{{$infoblock->title}}</a></li>
                                    @else
                                        <li class="toc__item"><a class="smooth " href="#smooth-{{++$key}}">{{$infoblock->title}}</a></li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page__center">
                <h1 class="page-title">Обзор {{ $hosting->hosting_name }}</h1>
                <div class="visitor-review-agg">
                    <div class="visitor-review-agg__overview">
                        <div class="rating__container--parent">
                            <div class="rating__container">
                                <div class="rating__stars">
                                    @for($i = 1, $half_star = floor($hosting->rating); $i <= 5; $i++)
                                        @if($i <= $hosting->rating)
                                            <div class="rating__star rating__star--full">
                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                </svg>
                                            </div>
                                        @elseif($i == $half_star + 1 && $hosting->rating - floor($hosting->rating) != 0)
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
                        <span class="visitor-review-agg__count">{{ $hosting->cntComments }}</span>
                    </div>
                    <span class="visitor-review-agg__border-bottom"></span>
                </div>
                <div class="product-review">
                    <div class="widgets-bar">
                        <div class="by-author">
                            <div class="by-author__author-credentials">
{{--                                <img class="by-author__image" src="https://images.top10.com/f_auto,q_auto/v1/production/authors/uploads/photo/top10stuff.20200401092113.jpeg" alt="Top10 Staff" title="Top10 Staff">--}}
                                <div class="by-author__author-metadata">
                                    <div class="by-author__author-name"><span class="by-author__author">hosting-for-site</span></div><span
                                        class="by-author__pubdate">Последнее обновление: {{ date("d.m.Y", strtotime($hosting->updated_at)) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <article class="html-content">
                        <div class="html-content__section">

                            @if($hosting->admin_voice)
                            <h2 class="in-a-nutshell has-user-reviews">Краткое описание</h2>
                            <div class="in-a-nutshell">
                                {{ $hosting->admin_voice }}
                            </div>
                            @endif

                            <div class="pros-cons">
                                <div class="pros">
                                    <h3>Плюсы</h3>
                                    <ul>
                                        @foreach($hosting->advanteges as $advantege)
                                            @if($advantege->type)
                                            <li>{{ $advantege->text }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="cons">
                                    <h3>Минусы</h3>
                                    <ul>
                                        @foreach($hosting->advanteges as $advantege)
                                            @if(!$advantege->type)
                                                <li>{{ $advantege->text }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="chart-wysiwyg">
                            <div class="chart-wysiwyg__html">
                                <div class="image-zoom-modal-overlay image-zoom-modal-overlay--hidden">
                                    <div class="image-zoom-modal-overlay__content">
                                        <img class="image-zoom-modal-overlay__content__image" alt="" src="">
                                        <svg class="image-zoom-modal-overlay__content__close" id="x-close" viewBox="0 0 13 13" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13 1.3L11.7 0 6.5 5.2 1.3 0 0 1.3l5.2 5.2L0 11.7 1.3 13l5.2-5.2 5.2 5.2 1.3-1.3-5.2-5.2z" fill="inherit" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="html-content__section">
                                    <span class="product-cta-button ">
                                        <span class="product-cta-button-icon">
                                            <img class="product-cta-button-icon-image" src="{{asset('/storage/'.$hosting->small_logo)}}" alt="img">
                                        </span>
                                        <span class="product-cta-button-text">{{ $hosting->hosting_name }}</span>
                                        <span class="product-cta-button-links">
                                            <a class="cta-button nilink" target="_blank" href="//{{ $hosting->hosting_url }}">Перейти</a>
                                        </span>
                                    </span>
                                    {{-- infoblocks --}}
                                    @foreach($hosting->infoblocks as $key => $infoblock)
                                        <h2 id="smooth-{{ ++$key }}">{{ $infoblock->title }}</h2>
                                        {!! $infoblock->description !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </article>
{{--                    <div class="by-author__extended">--}}
{{--                        <div class="by-author__author-credentials">--}}
{{--                            <div class="by-author__author-metadata">--}}
{{--                                <div class="by-author__author-name">--}}
{{--                                    <span class="by-author__by">By</span>--}}
{{--                                    <span class="by-author__author">top10 Staff</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="by-author__bio">Our editorial staff is comprised of writers who are knowledgeable about business--}}
{{--                            services. We specialize in simplifying the process of choosing the right hosting service for your business.--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="visitors-reviews">
                        <h2 class="visitors-reviews__header visitors-reviews__header--main">Отзывы клиентов {{ $hosting->hosting_name }}</h2>
                        <div class="visitors-reviews__sub-header">
                            <div class="visitors-reviews__overall-container">
                                <div class="rating__container">
                                    <div class="rating__stars">
                                        @for($i = 1, $half_star = floor($hosting->rating); $i <= 5; $i++)
                                            @if($i <= $hosting->rating)
                                                <div class="rating__star rating__star--full">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                </div>
                                            @elseif($i == $half_star + 1 && $hosting->rating - floor($hosting->rating) != 0)
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
                            </div><span class="visitors-reviews__count">{{ $hosting->cntComments }}</span>
                        </div>
                        <div class="visitors-reviews__sub-categories">
                            <div class="rating__container">
                                <h4 class="rating__category rating__category--title">Простота использования</h4>
                                <div class="rating__stars">
                                    @for($i = 1, $half_star = floor($hosting->rating_usability); $i <= 5; $i++)
                                        @if($i <= $hosting->rating_usability)
                                            <div class="rating__star rating__star--full">
                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                </svg>
                                            </div>
                                        @elseif($i == $half_star + 1 && $hosting->rating_usability - floor($hosting->rating_usability) != 0)
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
                            <div class="rating__container">
                                <h4 class="rating__category rating__category--title">Удовлетворенность</h4>
                                <div class="rating__stars">
                                    @for($i = 1, $half_star = floor($hosting->rating_satisfaction); $i <= 5; $i++)
                                        @if($i <= $hosting->rating_satisfaction)
                                            <div class="rating__star rating__star--full">
                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                </svg>
                                            </div>
                                        @elseif($i == $half_star + 1 && $hosting->rating_satisfaction - floor($hosting->rating_satisfaction) != 0)
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
                            <div class="rating__container">
                                <h4 class="rating__category rating__category--title">Цена</h4>
                                <div class="rating__stars">
                                    @for($i = 1, $half_star = floor($hosting->rating_money); $i <= 5; $i++)
                                        @if($i <= $hosting->rating_money)
                                            <div class="rating__star rating__star--full">
                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                </svg>
                                            </div>
                                        @elseif($i == $half_star + 1 && $hosting->rating_money - floor($hosting->rating_money) != 0)
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
                            <div class="rating__container">
                                <h4 class="rating__category rating__category--title">Сервис</h4>
                                <div class="rating__stars">
                                    @for($i = 1, $half_star = floor($hosting->rating_quality); $i <= 5; $i++)
                                        @if($i <= $hosting->rating_quality)
                                            <div class="rating__star rating__star--full">
                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                </svg>
                                            </div>
                                        @elseif($i == $half_star + 1 && $hosting->rating_quality - floor($hosting->rating_quality) != 0)
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
                        <form action="" class="write-review" id="#write-review">
                            {{ csrf_field() }}
                            <input type="hidden" id="hosting-id" value="{{ $hosting->id }}">
                            <input type="hidden" id="check">
                            <div class="write-review__main-header">
                                <div class="write-review__left-side">
                                    <svg class="write-review__visitor-icon" id="anonymous-user" viewBox="0 0 42 42" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><circle cx="20" cy="20" r="20" transform="translate(1 1)" fill="#FFF" stroke="#1789D5"></circle><g fill="#1789D5"><path d="M21 27.5c6.03 0 11.28 3.275 14 8.108A22.408 22.408 0 0 1 21 40.5a22.403 22.403 0 0 1-14-4.892c2.72-4.833 7.97-8.108 14-8.108zM21.5 8.5a8.5 8.5 0 1 1 0 17 8.5 8.5 0 0 1 0-17z"></path></g></g></svg>
                                    <span class="write-review__title">Написать отзыв</span>
                                </div>
                                <div class="rating__container" data-rating="0">
                                    <div class="rating__stars">
                                        <div class="rating__star">
                                            <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                            </svg>
                                            <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <g fill-rule="nonzero" fill="none">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                    <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                </g>
                                            </svg>
                                            <div class="rating__left-side" data-value="0.5"></div>
                                            <div class="rating__right-side" data-value="1"></div>
                                        </div>
                                        <div class="rating__star">
                                            <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                            </svg>
                                            <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <g fill-rule="nonzero" fill="none">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                    <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                </g>
                                            </svg>
                                            <div class="rating__left-side" data-value="1.5"></div>
                                            <div class="rating__right-side" data-value="2"></div>
                                        </div>
                                        <div class="rating__star">
                                            <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                            </svg>
                                            <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <g fill-rule="nonzero" fill="none">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                    <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                </g>
                                            </svg>
                                            <div class="rating__left-side" data-value="2.5"></div>
                                            <div class="rating__right-side" data-value="3"></div>
                                        </div>
                                        <div class="rating__star">
                                            <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                            </svg>
                                            <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <g fill-rule="nonzero" fill="none">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                    <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                </g>
                                            </svg>
                                            <div class="rating__left-side" data-value="3.5"></div>
                                            <div class="rating__right-side" data-value="4"></div>
                                        </div>
                                        <div class="rating__star">
                                            <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                            </svg>
                                            <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                <g fill-rule="nonzero" fill="none">
                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                    <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                </g>
                                            </svg>
                                            <div class="rating__left-side" data-value="4.5"></div>
                                            <div class="rating__right-side" data-value="5"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="write-review__first-step write-review__first-step--hidden">
                                <div class="write-review__content">
                                    <h3 class="write-review__title">Установите рейтинг категорий</h3>
                                    <div class="write-review__sub-category">
                                        <h4 class="write-review__title write-review__title--lighter">Простота использования</h4>
                                        <span class="write-review__dotted-line"></span>
                                        <div class="rating__container usability" data-rating="0">
                                            <div class="rating__stars">
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="0.5"></div>
                                                    <div class="rating__right-side" data-value="1"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="1.5"></div>
                                                    <div class="rating__right-side" data-value="2"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="2.5"></div>
                                                    <div class="rating__right-side" data-value="3"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="3.5"></div>
                                                    <div class="rating__right-side" data-value="4"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="4.5"></div>
                                                    <div class="rating__right-side" data-value="5"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="write-review__sub-category">
                                        <h4 class="write-review__title write-review__title--lighter">Удовлетворенность</h4>
                                        <span class="write-review__dotted-line"></span>
                                        <div class="rating__container satisfaction" data-rating="0">
                                            <div class="rating__stars">
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="0.5"></div>
                                                    <div class="rating__right-side" data-value="1"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="1.5"></div>
                                                    <div class="rating__right-side" data-value="2"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="2.5"></div>
                                                    <div class="rating__right-side" data-value="3"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="3.5"></div>
                                                    <div class="rating__right-side" data-value="4"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="4.5"></div>
                                                    <div class="rating__right-side" data-value="5"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="write-review__sub-category">
                                        <h4 class="write-review__title write-review__title--lighter">Цена</h4>
                                        <span class="write-review__dotted-line"></span>
                                        <div class="rating__container money" data-rating="0">
                                            <div class="rating__stars">
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="0.5"></div>
                                                    <div class="rating__right-side" data-value="1"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="1.5"></div>
                                                    <div class="rating__right-side" data-value="2"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="2.5"></div>
                                                    <div class="rating__right-side" data-value="3"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="3.5"></div>
                                                    <div class="rating__right-side" data-value="4"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="4.5"></div>
                                                    <div class="rating__right-side" data-value="5"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="write-review__sub-category">
                                        <h4 class="write-review__title write-review__title--lighter">Сервис</h4>
                                        <span class="write-review__dotted-line"></span>
                                        <div class="rating__container quality" data-rating="0">
                                            <div class="rating__stars">
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="0.5"></div>
                                                    <div class="rating__right-side" data-value="1"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="1.5"></div>
                                                    <div class="rating__right-side" data-value="2"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="2.5"></div>
                                                    <div class="rating__right-side" data-value="3"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="3.5"></div>
                                                    <div class="rating__right-side" data-value="4"></div>
                                                </div>
                                                <div class="rating__star">
                                                    <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                    </svg>
                                                    <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="nonzero" fill="none">
                                                            <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                            <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__left-side" data-value="4.5"></div>
                                                    <div class="rating__right-side" data-value="5"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="write-review__footer">
                                    <div class="progress-bar">
                                        <div class="progress-bar__background">
                                            <div class="progress-bar__fill" style="width:0"></div>
                                        </div>
                                    </div>
                                    <button type="button" id="cancel-rating" class="write-review__button write-review__button--back"><span class="write-review__text">Отмена</span></button>
                                    <button type="button" id="go-to-step-2" class="write-review__button write-review__button--next"><span class="write-review__text">Далее</span></button>
                                </div>
                            </div>
                            <div class="write-review__second-step write-review__second-step--hidden">
                                <div class="write-review__content">
                                    <h3 class="write-review__title">Поделитесь своим опытом</h3>
                                    <p class="write-review__paragraph">Люди обсуждают, цену, уровень удовлетворенности и многое другое.</p>
                                    <div class="write-review__header">
                                        <h4 class="write-review__title write-review__title--secondary">Напишите свой отзыв</h4><span
                                            class="write-review__date">{{ date("d.m.Y") }}</span>
                                    </div>
                                    <label for="ni-user-review--content">
                                        <!-- <span class="write-review__label write-review__label--textarea">Review</span> -->
                                        <textarea maxlength="800" type="text" id="ni-user-review--content" required placeholder="Что вам понравилось или не понравилось?" class="write-review__input write-review__input--textarea" name="user-review"></textarea>
                                        <span class="write-review__word-count">0/ 30 characters</span>
                                    </label>
                                </div>
                                <div class="write-review__footer">
                                    <div class="progress-bar">
                                        <div class="progress-bar__background">
                                            <div class="progress-bar__fill" style="width: 25%;" data-role="progress-bar-fill"></div>
                                        </div>
                                    </div>
                                    <button type="button" id="back-to-step-1" class="write-review__button write-review__button--back">
                                        <span class="write-review__text">Назад</span>
                                    </button>
                                    <button type="button" id="go-to-step-3" class="write-review__button write-review__button--next" disabled>
                                        <span class="write-review__text">Далее</span>
                                    </button>
                                </div>
                            </div>
                            <div class="write-review__third-step write-review__third-step--hidden">
                                <div class="write-review__content">
                                    <h3 class="write-review__title">Почти готово</h3>
                                    <p class="write-review__paragraph">Убедитесь, что все правильно, заполните свои данные и отправьте свой отзыв!</p>
                                    <div class="write-review__card">
                                        <div class="write-review__summary write-review__summary--top-section">
                                            <div class="write-review__summary write-review__summary--user-container">
                                                <img class="write-review__summary write-review__summary--gender-logo" src="{{asset('assets/img/user.svg')}}">
                                                <div class="write-review__summary write-review__summary--user-details">
                                                    <span class="write-review__summary write-review__summary--user-name">Гость</span>
                                                </div>
                                            </div>
                                            <div class="write-review__overall-rank write-review__overall-rank--summary">
                                                <div class="rating__container--parent">
                                                    <div class="rating__container" data-rating="0">
                                                        <div class="rating__stars">
                                                            <div class="rating__star">
                                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                </svg>
                                                                <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <g fill-rule="nonzero" fill="none">
                                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                                        <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="rating__star">
                                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                </svg>
                                                                <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <g fill-rule="nonzero" fill="none">
                                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                                        <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="rating__star">
                                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                </svg>
                                                                <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <g fill-rule="nonzero" fill="none">
                                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                                        <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="rating__star">
                                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                </svg>
                                                                <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <g fill-rule="nonzero" fill="none">
                                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                                        <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="rating__star">
                                                                <svg viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="inherit"></path>
                                                                </svg>
                                                                <svg class="half-star" viewBox="0 0 17 15" xmlns="http://www.w3.org/2000/svg">
                                                                    <g fill-rule="nonzero" fill="none">
                                                                        <path d="M8.5 12.85l-4.378 2.214a.355.355 0 01-.512-.371l.753-4.849-3.459-3.48a.355.355 0 01.195-.601l4.844-.782L8.183.616a.355.355 0 01.633 0l2.241 4.365 4.844.782a.355.355 0 01.195.601l-3.459 3.48.753 4.849a.355.355 0 01-.512.371L8.5 12.85z" fill="#D5D5D5"></path>
                                                                        <path d="M8.5 12.848l-4.38 2.214a.355.355 0 01-.51-.372l.752-4.848-3.459-3.48A.355.355 0 011.1 5.76l4.843-.782L8.183.613A.355.355 0 018.498.42" fill="#FFB401"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="write-review__lower-section" data-review-text="true">
                                            <span class="write-review__today">Сегодня</span>
                                            <p class="write-review__paragraph write-review__paragraph--user-review">www</p>
                                        </div>
                                    </div>
                                    <label for="ni-user-review--email">
                                        <!-- <span class="write-review__label write-review__label--email">Please email email address</span> -->
                                        <input type="text" name="email" placeholder="Ваш email" class="write-review__input write-review__input--email" id="review-email" value="">
{{--                                        <span class="write-review__email-validation">Please add your email</span>--}}
{{--                                        <span class="write-review__text-below">Don’t worry, your email won’t be published and will be processed subject to our Privacy Policy.</span>--}}
                                    </label>
                                    <div class="write-review__additional-user-details">
                                        <label for="ni-user-review--full-name">
                                            <!-- <span class="write-review__label write-review__label--full-name">Please fullName email address</span> -->
                                            <input type="text" name="user-name" placeholder="Ваше имя" class="write-review__input write-review__input--full-name" id="review-name" value="">
{{--                                            <span class="write-review__full-name-validation">Please add your full name</span>--}}
{{--                                            <span class="write-review__text-below">Only your first name will be shown</span>--}}
                                        </label>
                                        <label for="ni-user-review--full-name">
                                            <!-- <span class="write-review__label write-review__label--full-name">Please fullName email address</span> -->
                                            <input type="text" name="position" placeholder="Ваша должность" class="write-review__input write-review__input--position" id="review-position" value="">
{{--                                            <span class="write-review__full-name-validation">Please add your зщышешщт</span>--}}
                                        </label>
                                    </div>
                                </div>
                                <div class="write-review__footer">
                                    <div class="progress-bar">
                                        <div class="progress-bar__background">
                                            <div class="progress-bar__fill" style="width: 50%;" data-role="progress-bar-fill"></div>
                                        </div>
                                    </div>
                                    <button type="button" id="back-to-step-2" class="write-review__button write-review__button--back">
                                        <span class="write-review__text">Назад</span>
                                    </button>
                                    <button type="button" id="go-to-step-4" class="write-review__button write-review__button--next" disabled>
                                        <span class="write-review__text">Отправить</span>
                                    </button>
                                </div>
                            </div>
                            <div class="write-review__thank-you write-review__thank-you--hidden"> <!--write-review__thank-you--hidden-->
                                <div class="write-review__thank-you__container">
                                    <div class="write-review__thank-you__message-container">
                                        <div class="write-review__thank-you__message-title">Отправлено</div>
                                        <div class="write-review__thank-you__message-description">Спасибо, нам нравится получать ваши отзывы</div>
                                    </div>
                                    <!-- <svg class="write-review__icon">
                                        <use xlink:href="#thank-you"></use>
                                    </svg> -->
                                </div>
                            </div>
                        </form>
                        @if(count($hosting->comments) > 0)
                            <h3 class="visitors-reviews__header">Коментарии пользователей</h3>
                        @endif
                        <div>
                            @foreach($hosting->comments as $key => $comment)
                                <div class="visitors-reviews__card {{ $key > 9 ? 'hidden' : '' }}">
                                    <div class="visitors-reviews__details">
                                        <div class="visitors-reviews__details visitors-reviews__details--visitor">
                                            <img class="visitors-reviews__gender" src="{{asset('assets/img/user.svg')}}" alt="user">
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
                                        </div>
                                    </div>
                                    <p class="visitors-reviews__details visitors-reviews__details--review">
                                        {{ $comment->text }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        @if(count($hosting->comments) > 10)
                        <div class="visitors-reviews__show-more">
                            <div class="visitors-reviews__show-more__separator"></div>
                            <button class="visitors-reviews__show-more__button" id="show-more-comment">Show More </button>
                            <div class="visitors-reviews__show-more__separator"></div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="page__right-sidebar">
                <div class="product-sidebar">
                    <a class="nilink  product-sidebar__logo-container nilink" href="{{ $hosting->hosting_url }}" target="_blank">
                        <img class="product-sidebar__logo" src="{{asset('/storage/'.$hosting->logo)}}" alt="">
                    </a>
                    <a class="product-sidebar__button product-sidebar__button--arrow nilink nilink" href="//{{ $hosting->hosting_url }}" target="_blank">Перейти</a>
                </div>
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
                <div class="legal-declarations" data-score-test="false">
                    <h3 class="legal-declarations__title">Our <span class="legal-declarations__title--alt">rating</span> system</h3>
                    <h4 class="legal-declarations__subtitle">Our customer reviews are provided by consumers like you</h4>
                    <div class="legal-declarations__body">
                        The star ratings are based on an overall rating of the brands displayed, as well as specific ratings for ease of use, purchase satisfaction, value for money and quality of service. Any customer can, and is encouraged to write a review of their experiences with these brands.
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
                                <div class="lazy related-articles__item__image lazy" data-bg="url('https://images.top10.com/f_auto,q_auto/v1/production/articles/uploads/photo/VirtualPrivateserverandbinarycodefeature.20200408120106.jpg')" data-was-processed="true" style="background-image: url(&quot;https://images.top10.com/f_auto,q_auto/v1/production/articles/uploads/photo/VirtualPrivateserverandbinarycodefeature.20200408120106.jpg&quot;);"></div>
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
