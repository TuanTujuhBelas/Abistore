@extends('layouts.default')
@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="box-title">Transaksi Masuk</div>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>Rp {{ $item->transaction_total }}</td>
                                        <td>
                                            @if($item->transaction_status == 'PENDING')
                                                <span class="badge badge-info">
                                            @elseif($item->transaction_status == 'SUCCESS')
                                                <span class="badge badge-success">
                                            @elseif($item->transaction_status == 'FAILED')
                                                <span class="badge badge-danger">
                                            @else
                                                <span>
                                            @endif
                                            {{ $item->transaction_status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($item->transaction_status == 'PENDING')
                                                <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="{{ route('transaction.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            @endif
                                            <a href="#mymodal" 
                                                data-remote="{{ route('transaction.show', $item->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Transaksi {{ $item->uuid }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>   
                                            </a>
                                            <form action="{{ route('transaction.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center p-5">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection