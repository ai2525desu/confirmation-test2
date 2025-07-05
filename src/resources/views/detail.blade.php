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
            <span class="detail-form__heading--item">
                >&nbsp;{{ $product->name }}
            </span>
        </div>
        <div class="detail-form__content-wrap">
            <div class="detail-form__content">
                <div class="detail-form__content--item">
                    @if ($product->image)
                    <img id="preview-image" src="{{  asset('storage/' . $product->image) }}" alt="プレビュー画像">
                    <input type="hidden" name="existing_image" value="{{ $product->image }}">
                    @endif
                    <input id="image" type="file" name="image" class="image-input" accept="image/*">
                    <label for="image" class="image-button">ファイルを選択</label>
                    <span id="selected-filename" class="filename-display"></span>
                    <div class="detail-form__content-error">
                        @if ($errors->has('image'))
                        <ul class="content-error__text">
                            @foreach ($errors->get('image') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
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
                        @if ($errors->has('name'))
                        <ul class="content-error__text">
                            @foreach ($errors->get('name') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
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
                        @if ($errors->has('price'))
                        <ul class="content-error__text">
                            @foreach ($errors->get('price') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="detail-form__content-group">
                    <div class="content-group__title">
                        <div class="content-group__label">
                            <label for="price">季節</label>
                        </div>
                    </div>
                    <div class="content-group__item">
                        <div class="content-group__item--checkbox">
                            @foreach ($seasons as $season)
                            <label class="custom-radio">
                                <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                {{ $season->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="content-group__error">
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
                    @if ($errors->has('description'))
                    <ul class="content-error__text">
                        @foreach ($errors->get('description') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
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
            </div>
        </div>
    </form>
    </form>
    <!-- 削除機能：未実施 -->
    <div class="button-delete">
        <form class="delete-form" action="/products/{{ $product->id }}/delete" method="post" novalidate>
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


<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }
        reader.readAsDataURL(file);

        document.getElementById('selected-filename').textContent = file.name;
    });
</script>

@endsection