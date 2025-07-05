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
                @if ($errors->has('name'))
                <ul class="content-error__text">
                    @foreach ($errors->get('name') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
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
                @if ($errors->has('price'))
                <ul class="content-error__text">
                    @foreach ($errors->get('price') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        <div class="register-form__group--image">
            <div class="register-form__group-title">
                <div class="register-form__label--item">
                    <label for="image">商品画像</label>
                </div>
                <div class="register-form__label--required">必須</div>
            </div>
            <div class="register-form__group-content">
                <div class="register-form__input--image">
                    <div class="image-wrap">
                        <img id="preview-image" src="#" alt="プレビュー画像" class="preview-image">
                        <input id="image" type="file" name="image" class="image-input" accept="image/*">
                    </div>
                    <div class="image-item">
                        <label for="image" class="image-button">ファイルを選択</label>
                        <span id="selected-filename" class="filename-display"></span>
                    </div>
                </div>
            </div>
            <div class="register-form__error">
                @if ($errors->has('image'))
                <ul class="content-error__text">
                    @foreach ($errors->get('image') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
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
                    @foreach ($seasons as $season)
                    <label class="custom-radio">
                        <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                        {{ $season->name }}
                    </label>
                    @endforeach
                </div>
                <div class="register-form__error">
                    @if ($errors->has('seasons'))
                    <ul class="content-error__text">
                        @foreach ($errors->get('seasons') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
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
                @if ($errors->has('description'))
                <ul class="content-error__text">
                    @foreach ($errors->get('description') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
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
    </form>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview-image');
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);

        document.getElementById('selected-filename').textContent = file.name;
    });
</script>
@endsection