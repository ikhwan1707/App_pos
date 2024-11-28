@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Daftar Transaksi</h3>
            </div>
            <div class="card-body table-responsive">

                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Transaction Id</th>
                            <th>Customer</th>
                            <th>Total Belanja</th>
                            <th>Total Pembayaran</th>
                            <th>Kasir</th>
                            <th>Status</th>
                            <th>Tanggal Transaction</th>
                            <th><a href="{{ route('transaction.create') }}" class="btn btn-primary btn-sm">Create
                                    Transaction</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @forelse($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->transaction_id }}</td>
                            <td>{{ $transaction->customer->customer_name ?? 'Guest' }}</td>
                            <td>Rp. {{ number_format($transaction->total_amount, 2) }}</td>
                            <td>Rp. {{ number_format($transaction->payment->amount ?? 0, 2) }}</td>
                            <td>{{ $transaction->users->name }}</td>
                            <td>{{ ucfirst($transaction->status) }}</td>
                            <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                            <td>
                                <form action="{{ route('transaction.destroy', $transaction->transaction_id) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('report.generateid', $transaction->transaction_id) }}" class="btn btn-warning btn-sm"
                                        target="_blank">Print</a>
                                    <a href="{{ route('transaction.show', $transaction->transaction_id) }}" class="btn btn-success btn-sm">Detail</a>
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php $grandTotal += $transaction->total_amount; @endphp
                        @empty
                        <tr>
                            <td colspan="9" align="center">Empty</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot style="font-weight: bold;">
                        <tr>
                            <td colspan="3" style="text-align: center;">Total Keseluruhan</td>
                            <td colspan="7">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection