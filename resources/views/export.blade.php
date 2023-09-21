<!-- exports/orders.blade.php -->

<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>User</th>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Created</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; ?>
        @foreach($orders as $order)
        <tr>
            <td>{{ $no++ }}</td>
            <th scope="row">#{{ $order->code_id }} - {{ $order->id }}</th>
            <td>{{ $order->userName }}</td>
            <td>{{ $order->productName }}</td>
            <td>{{ number_format($order->price, 0, ',', '.') }}</td>
            <td>{{ $order->qty }}</td>
            <td>{{ number_format($order->total, 0, ',', '.') }}</td>
            <td>{{ $order->created_at }}</td>
            <td>Proses</td>
        </tr>
        @endforeach
    </tbody>
</table>