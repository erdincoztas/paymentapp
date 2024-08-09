<!DOCTYPE html>
<html>
<head>
    <title>İsim Soyisim Formu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Yeni Ürün Ekle</h2>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{$errors->first()}}</div>
    @endif

    <form method="POST" action="{{ route('product.create') }}">
        @csrf
        <div class="form-group">
            <label for="first_name">Ürün İsmi</label>
            <input type="text" class="form-control" id="product_name" name="product_name" >
        </div>
        <div class="form-group">
            <label for="last_name">Ürün Fiyatı</label>
            <input type="text" class="form-control" id="product_price" name="product_price">
        </div>
        <button type="submit" class="btn btn-primary">Ürün Ekle</button>
    </form>
</div>
</body>
</html>
