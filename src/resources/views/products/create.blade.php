@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 0 auto; padding: 2rem;">
    <h2 style="font-size: 1.5rem; font-weight: bold;">商品登録</h2>

    @if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">商品名 <span style="color: red;">必須</span></label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="price">値段 <span style="color: red;">必須</span></label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="image">商品画像 <span style="color: red;">必須</span></label>
            <input type="file" name="image" required>
        </div>

        <div>
            <label>季節 <span style="color: red;">必須</span> <span>複数選択可</span></label><br>
            <label><input type="checkbox" name="season[]" value="spring"> 春</label>
            <label><input type="checkbox" name="season[]" value="summer"> 夏</label>
            <label><input type="checkbox" name="season[]" value="autumn"> 秋</label>
            <label><input type="checkbox" name="season[]" value="winter"> 冬</label>
        </div>

        <div>
            <label>商品説明 <span style="color: red;">必須</span></label>
            <textarea name="description" rows="5">{{ old('description') }}</textarea>
        </div>

        <div style="margin-top: 1rem;">
            <button type="submit" class="btn btn-warning" style="background-color: gold;">登録</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">戻る</a>
        </div>
    </form>
</div>
@endsection