@extends('dashboard')
@section('admin')
    <div id="urunler" class="content">
    <h2>Ürünler</h2>
    <table>
        <thead>

        <tr>
            <th>Ürün Adı</th>
            <th>Fiyat</th>
            <th>Satın al</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>

                <td><a onclick="return confirm('silmek istediğinizden emin misiniz?')" href="{{route('products.delete', $product->id)}}">SİL</a></td>
            </tr>
        @endforeach
        <!-- Daha fazla ürün buraya eklenebilir -->
        </tbody>
    </table>
</div>
@endsection
