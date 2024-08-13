@extends('dashboard')
@section('admin')
    <div id="urunler" class="content">
        <form action="{{route('siparisler')}}"><input type="text" name="ara" class="search-box" value="{{ $orderarea }}"  placeholder="Arama yap...">
            <button type="submit"  class="search-button">Ara</button>
        </form>

        <h2>Siparişler</h2>

        <table>
            <thead>

            <tr>
                <th>Müşteri Adı</th>
                <th>Müşteri Adresi</th>
                <th>Ürün ismi</th>
                <th>Birim fiyatı</th>
                <th>Toplam Tutar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_address }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->product_pieces }}</td>
                    <td>{{ $order->total_price }}</td>

                </tr>
            @endforeach
            <!-- Daha fazla ürün buraya eklenebilir -->
            </tbody>
        </table>

        {{ $orders->links() }}
    </div>
@endsection
