@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product-list.css') }}">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
@endsection

@section('content')
<div class="product-list__content">
    <div class="product-list__header">
        <h2 class="product-list__heading">
            商品一覧
        </h2>
        <a class="product-list__move--register-screen" href="/products/register">
            + 商品を追加
        </a>
    </div>
    <div class="product-list__item">
        <div class="product-list__search-form">
            <form class="search-form" action="/products/search" method="get" novalidate>
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input--keyword" type="text" name="keyword" placeholder="商品名で検索" value="{{ request('keyword') }}">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button--submit" type="submit">
                        検索
                    </button>
                </div>
                <div class="search-form__item">
                    <div class="search-form__item--sort">
                        <h3 class="search-form__item--sort-heading">
                            価格順で表示
                        </h3>
                        <select class="search-form__item--select-conditions">
                            <option value="expensive">高い順に表示</option>
                            <option value="cheap">安い順に表示</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="product-list__lists">
        <div class="product-list__lists--card-wrap">
            <!-- 繰り返しで表示する下地 -->
            <!-- {{--@foreach ($products as $product)
            <div class="product-card">
                <div class="product-card__image">
                    <img src="{{ asset('/storage' . $product->image_path" alt="{{ $product->name }}">
                </div>
                <div class="product-card__tag">
                    <p class="product-card__tag--name">{{ $product->'name' }}
                    <p>
                    <p class="product-card__tag--price">{{ $product->price }}
                    <p>
                </div>
            </div>
            @endforeach--}} -->
            <div class="product-card">
                <div class="product-card__image">
                    <img src="{{ asset('/storage/kiwi.png') }}" alt="キウイ">
                </div>
                <div class="product-card__tag">
                    <p class="product-card__tag--item">キウイ1</p>
                    <p class="product-card__tag--item">¥800</p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-card__image">
                    <img src="{{ asset('/storage/kiwi.png') }}" alt="キウイ">
                </div>
                <div class="product-card__tag">
                    <p class="product-card__tag--item">キウイ2</p>
                    <p class="product-card__tag--item">¥800</p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-card__image">
                    <img src="{{ asset('/storage/kiwi.png') }}" alt="キウイ">
                </div>
                <div class="product-card__tag">
                    <p class="product-card__tag--item">キウイ3</p>
                    <p class="product-card__tag--item">¥800</p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-card__image">
                    <img src="{{ asset('/storage/kiwi.png') }}" alt="キウイ">
                </div>
                <div class="product-card__tag">
                    <p class="product-card__tag--item">キウイ4</p>
                    <p class="product-card__tag--item">¥800</p>
                </div>
            </div>
        </div>
        <div class="product-list__lists--pagonation">
            <!-- ページネーション入れる -->
            ページネーション来る
            後でgrid形式に変更してやること
        </div>
    </div>
</div>
</div>

@endsection