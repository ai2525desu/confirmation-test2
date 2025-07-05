@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product-list.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="product-list__content">
    <div class="product-list__header">
        <h2 class="product-list__heading">
            @if (request('name'))
            “{{ request('name') }}”の商品一覧
            @else
            商品一覧
            @endif
        </h2>
        <a class="product-list__move--register-screen" href="/products/register">
            + 商品を追加
        </a>
    </div>
    <div class="product-list__item">
        <div class="product-list__search-form">
            <form class="search-form" action="/products/search" method="get" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input--name" type="text" name="name" placeholder="商品名で検索" value="{{ request('name') }}">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button--submit" type="submit">
                        検索
                    </button>
                </div>
                <div class="search-form__item">
                    <div class="search-form__item--sort">
                        <h3 class="sort__heading">
                            価格順で表示
                        </h3>
                        <select class="sort__select" name="sort" onchange="this.form.submit()">
                            <option value="" disabled selected>価格で並び替え</option>
                            <option value="expensive" {{ request('sort') == 'expensive' ? 'selected' : '' }}>
                                高い順に表示
                            </option>
                            <option value="cheap" {{ request('sort') == 'cheap' ? 'selected' : '' }}>
                                安い順に表示
                            </option>
                        </select>
                        @if (request('sort'))
                        <div class="sort__tag">
                            @if (request('sort') === 'expensive')
                            <span class="sort__tag--text">高い順に表示</span>
                            @elseif (request('sort') === 'cheap')
                            <span class="sort__tag--text">安い順に表示</span>
                            @endif
                            <a href="/products" id="resetsort" class="sort__tag--reset">
                                <img src="{{ asset('/storage/Frame 339.png') }}" alt="x">
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="product-list__lists">
        <div class="product-list__lists--card-wrap">
            @foreach ($products as $product)
            <a href="{{ route('detail', $product->id) }}" class="product-card">
                <div class="product-card__image">
                    <img src="{{  asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
                <div class="product-card__tag">
                    <p class="product-card__tag--name">{{ $product->name }}
                    </p>
                    <p class="product-card__tag--price">¥{{ $product->price }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="product-list__lists--pagonation">
            {{ $products->links() }}
        </div>
    </div>
</div>
</div>

@endsection