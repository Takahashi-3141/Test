@extends('layouts.app')

@section('content')
<div class="product-detail-container">
    <div class="breadcrumb">
        <a href="{{ route('products.index') }}">商品一覧</a> &gt; {{ $product ?? ''->name }}
    </div>

    <form action="{{ route('products.update', $product ?? ''->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="product-detail">
            <div class="product-image-section">
                <img src="{{ asset('storage/' . $product ?? ''->image_path) }}" alt="{{ $product ?? ''->name }}" class="product-image">
                <div class="file-input-wrapper">
                    <input type="file" name="image" id="image">
                    <span>{{ basename($product ?? ''->image_path) }}</span>
                </div>
            </div>

            <div class="product-info-section">
                <div class="form-group">
                    <label for="name">商品名</label>
                    <input type="text" name="name" id="name" value="{{ $product ?? ''->name }}">
                </div>

                <div class="form-group">
                    <label for="price">値段</label>
                    <input type="number" name="price" id="price" value="{{ $product ?? ''->price }}">
                </div>

                <div class="form-group">
                    <label>季節</label>
                    <div class="seasons">
                        @foreach(['春', '夏', '秋', '冬'] as $season)
                        <label>
                            <input type="checkbox" name="seasons[]" value="{{ $season }}"
                                {{ in_array($season, $product ?? ''->seasons ?? []) ? 'checked' : '' }}>
                            {{ $season }}
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="product-description">
            <label for="description">商品説明</label>
            <textarea name="description" id="description" rows="6">{{ $product ?? ''->description }}</textarea>
        </div>

        <div class="form-buttons">
            <a href="{{ route('products.index') }}" class="btn-back">戻る</a>
            <button type="submit" class="btn-save">変更を保存</button>

            <form action="{{ route('products.destroy', $product ?? ''->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="return confirm('本当に削除しますか？')">
                    🗑
                </button>
            </form>
        </div>
    </form>
</div>
@endsection