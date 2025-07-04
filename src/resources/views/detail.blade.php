@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="detail-content">
    <form class="detail-form" action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data" novalidate>
        @method('PATCH')
        @csrf
        <div class="detail-form__header">
            <span class="detail-form__heading">
                商品一覧
            </span>
            <span clas="detail-form__heading--item">
                {{-- >&nbsp;{{ $product->name }} --}}
                >&nbsp;キウイ
            </span>
        </div>
        <div class="detail-form__content-wrap">
            <div class="detail-form__content">
                <div class="detail-form__content--item">
                    <label for="image" class="image-button">ファイルを選択</label>
                    <input id="image" type="file" name="image" class="image-input">
                    {{-- <img src="{{ asset('/storage' . $product->image_path) }}"> --}}
                    <div class="detail-form__content-error">
                        @error('image')
                        {{ $message }}
                        @enderror
                        エラーメッセージ
                    </div>
                </div>
            </div>
            <div class="detail-form__content">
                <div class="detail-form__content-group">
                    <div class="content-group__title">
                        <div class="content-group__label">
                            <label for="name">商品名</label>
                        </div>
                    </div>
                    <div class="content-group__item">
                        <div class="content-group__item--input">
                            <input id="name" type="text" name="name" placeholder="商品名を入力" value="{{ old('name', $product->name) }}">
                        </div>
                    </div>
                    <div class="content-group__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="detail-form__content-group">
                    <div class="content-group__title">
                        <div class="content-group__label">
                            <label for="price">値段</label>
                        </div>
                    </div>
                    <div class="content-group__item">
                        <div class="content-group__item--input">
                            <input id="price" type="text" name="price" placeholder="値段を入力" value="{{ old('price', $product->price) }}">
                        </div>
                    </div>
                    <div class="content-group__error">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="detail-form__content-group">
                    <div class="content-group__title">
                        <div class="content-group__label">
                            <label for="price">季節</label>
                        </div>
                    </div>
                    <!-- チェックボックスの値の保持ができていない -->
                    <div class="content-group__item">
                        <div class="content-group__item--checkbox">
                            @foreach ($seasons as $season)
                            <label class="custom-radio">
                                <input type="checkbox" name="season[]" value="{{ $season->id }}">
                                <span class="checkmark"></span>
                                {{ $season->name }}
                            </label>
                            @endforeach
                            <!-- 現在のコード
                            <label class="custom-radio">
                                <input type="checkbox" name="season[]">
                                <span class="checkmark"></span>
                                春
                            </label>
                            <label class="custom-radio">
                                <input type="checkbox" name="season[]">
                                <span class="checkmark"></span>
                                夏
                            </label>
                            <label class="custom-radio">
                                <input type="checkbox" name="season[]">
                                <span class="checkmark"></span>
                                秋
                            </label>
                            <label class="custom-radio">
                                <input type="checkbox" name="season[]">
                                <span class="checkmark"></span>
                                冬
                            </label> -->
                        </div>
                    </div>
                    <div class="content-group__error">
                        @error('$season')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-form__content-description">
            <div class="detail-form__content-group">
                <div class="content-group__title">
                    <label for="description">商品説明</label>
                </div>
                <div class="content-group__item">
                    <div class="content-group__item--textarea">
                        <textarea id="description" name="description" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>
                <div class="content-group__error">
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="detail-form__button-wrap">
            <div class="button-update">
                <a class="detail-form__button back" href="/products">
                    戻る
                </a>
                <button class="detail-form__button update" type="submit">
                    変更を保存
                </button>
            </div>
            <div class="button-delete">
                <form class="delete-form" action="/products/{{ $product->id }}/delete" method="post" enctype="multipart/form-data" novalidate>
                    @method('DELETE')
                    @csrf
                    <div class="delete-form__button">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button class="delete-form__button--submit">
                            <img src="{{ asset('/storage/Vector.png') }}" alt="ゴミ箱">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </form>
</div>


@endsection