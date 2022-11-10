@extends('layouts.app')


@section('title', 'Penjualans List')
@section('content-header', 'Penjualan List')
@section('content-actions')
    <a href="{{route('cart.index')}}" class="btn btn-primary">Open POS</a>
@endsection





@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                <form action="{{route('penjualans.index')}}">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="date" name="start_date" class="form-control" value="{{request('start_date')}}" />
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="end_date" class="form-control" value="{{request('end_date')}}" />
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Konsumen</th>
                    <th>Total</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Sisa</th>
                    <th>Tanggal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualans as $penjualan)
                <tr>
                    <td>{{$penjualan->id}}</td>
                    <td>{{$penjualan->getCustomerName()}}</td>
                    <td>{{ config('settings.currency_symbol') }} {{$penjualan->formattedTotal()}}</td>
                    <td>{{ config('settings.currency_symbol') }} {{$penjualan->formattedReceivedAmount()}}</td>
                    <td>
                        @if($penjualan->receivedAmount() == 0)
                            <span class="badge bg-danger">Belum Bayar</span>
                        @elseif($penjualan->receivedAmount() < $penjualan->total())
                            <span class="badge bg-warning">Dicicil</span>
                        @elseif($penjualan->receivedAmount() == $penjualan->total())
                            <span class="badge bg-success">Lunas</span>
                        @elseif($penjualan->receivedAmount() > $penjualan->total())
                            <span class="badge bg-info">Pengembalian</span>
                        @endif
                    </td>
                    <td>{{config('settings.currency_symbol')}} {{number_format($penjualan->total() - $penjualan->receivedAmount(), 2)}}</td>
                    <td>{{$penjualan->created_at}}</td>
                    <td>
                        <a class="btn btn-default" href="{{route('cetaknotacustomer' , $penjualan->id)}}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> Struk</a>


                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>{{ config('settings.currency_symbol') }} {{ number_format($total, 2) }}</th>
                    <th>{{ config('settings.currency_symbol') }} {{ number_format($receivedAmount, 2) }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        {{ $penjualans->render() }}
    </div>
</div>
@endsection


<main id="main" class="main">


</main>


