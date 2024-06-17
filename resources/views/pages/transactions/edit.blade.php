@extends('layouts.default')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Transaction</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('transactions.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-control-label">Name</label>
                <input type="text" name="name" value="{{ old('name') ?? $item->name }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" name="email" value="{{ old('email') ?? $item->email }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="number" class="form-control-label">Phone Number</label>
                <input type="text" name="number" value="{{ old('number') ?? $item->number }}" class="form-control @error('number') is-invalid @enderror">
                @error('number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address" class="form-control-label">Address</label>
                <input type="text" name="address" value="{{ old('address') ?? $item->address }}" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="transaction_total" class="form-control-label">Transaction Total</label>
                <input type="number" name="transaction_total" value="{{ old('transaction_total') ?? $item->transaction_total }}" class="form-control @error('transaction_total') is-invalid @enderror">
                @error('transaction_total')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="transaction_status" class="form-control-label">Transaction Status</label>
                <select name="transaction_status" class="form-control @error('transaction_status') is-invalid @enderror">
                    <option value="PENDING" {{ old('transaction_status', $item->transaction_status) == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                    <option value="SUCCESS" {{ old('transaction_status', $item->transaction_status) == 'SUCCESS' ? 'selected' : '' }}>SUCCESS</option>
                    <option value="FAILED" {{ old('transaction_status', $item->transaction_status) == 'FAILED' ? 'selected' : '' }}>FAILED</option>
                </select>
                @error('transaction_status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Transaction</button>
        </form>
    </div>
</div>
@endsection
