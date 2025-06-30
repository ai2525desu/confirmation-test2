@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-content">
    <h2 class="register-content__heading">
        商品登録
    </h2>
    <form class="register-content__form" action="/products/register" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="register-form__group">
            <div class="register-form__group-title">
                <div class="register-form__label--item">
                    <label for="name">商品名</label>
                </div>
                <div class="register-form__label--required">必須</div>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input">
                    <input id="name" type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}">
                </div>
            </div>
            <div class="register-form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="register-form__group">
            <div class="register-form__group-title">
                <div class="register-form__label--item">
                    <label for="price">値段</label>
                </div>
                <div class="register-form__label--required">必須</div>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input">
                    <input id="price" type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
                </div>
            </div>
            <div class="register-form__error">
                @error('price')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="register-form__group">
            <div class="register-form__group-title">
                <div class="register-form__label--item">
                    <label for="image">商品画像</label>
                </div>
                <div class="register-form__label--required">必須</div>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input--image">
                    <label for="image" class="image-button">ファイルを選択</label>
                    <input id="image" type="file" name="image" class="image-input">
                    {{-- <img src="{{ asset('/storage' . $product->image_path) }}"> --}}
                </div>
            </div>
            <div class="register-form__error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="register-form__group">
            <div class="register-form__group-title">
                <div class="register-form__label--item">季節</div>
                <div class="register-form__label--required">必須</div>
                <div class="register-form__label--notice">複数選択可</div>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input--checkbox">
                    <!-- チェックボックスの例：こちらが良さそう -->
                    {{--@foreach ($seasons as $season)
                    <label class="custom-radio">
                        <input type="checkbox" name="season[]" value="{{ $season->id }}">
                    <span class="checkmark"></span>
                    {{ $season->name }}
                    </label>
                    @endforeach--}}
                    <!-- 現在のコード -->
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
                    </label>
                </div>
                <div class="register-form__error">
                    @error('season')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register-form__group">
            <div class="register-form__group-title">
                <div class="register-form__label--item">
                    <label for="description">商品説明</label>
                </div>
                <div class="register-form__label--required">必須</div>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input--textarea">
                    <textarea id="description" name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="register-form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="register-form__button-wrap">
            <a class="register-form__button back" href="/products">
                戻る
            </a>
            <button class="register-form__button register" type="submit">
                登録
            </button>
        </div>
</div>
</form>
</div>

@endsection