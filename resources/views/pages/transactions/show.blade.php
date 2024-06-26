<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $item->number }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $item->address }}</td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>Rp {{ $item->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>
            @if($item->transaction_status == 'PENDING')
                <span class="badge badge-info">{{ $item->transaction_status }}</span>
            @elseif($item->transaction_status == 'SUCCESS')
                <span class="badge badge-success">{{ $item->transaction_status }}</span>
            @elseif($item->transaction_status == 'FAILED')
                <span class="badge badge-danger">{{ $item->transaction_status }}</span>
            @else
                <span>{{ $item->transaction_status }}</span>
            @endif
        </td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach ($item->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>Rp {{ $detail->product->price }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="row mt-3">
                <div class="col-4">
                    <a href="{{ route('transactions.status', ['id' => $item->id, 'status' => 'SUCCESS']) }}" 
                        class="btn btn-success btn-block">
                        <i class="fa fa-check"></i>
                        Set Success
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ route('transactions.status', ['id' => $item->id, 'status' => 'FAILED']) }}" 
                        class="btn btn-danger btn-block">
                        <i class="fa fa-times"></i>
                        Set Gagal
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ route('transactions.status', ['id' => $item->id, 'status' => 'PENDING']) }}" 
                        class="btn btn-info btn-block">
                        <i class="fa fa-spinner"></i>
                        Set Pending
                    </a>
                </div>
            </div>
        </td>
    </tr>
</table>
