@if($orderId)
<p>Terima kasih atas pesanan Anda dengan ID pesanan: {{ $orderId }}</p>
<p>Pesanan Anda telah berhasil dibuat dan segera di proses.</p>
@else
<p>Terima kasih sudah order, </p>
<p>pesana product : <b><u>{{ $name }}</u></b> nampaknya stok tidak mencukupi</p>
@endif
@Ali Nurdin