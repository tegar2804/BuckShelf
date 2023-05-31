@extends('layouts.main')

@section('container')
<div class="sheet">
    <div><span class="nama_laman">Riwayat Transaksi</span></div>
    <div class="transparent-container">
        <span class="tanggal_order">22 Feb 2022</span>
        <div class="transparan">
            <div class="box"></div>
            <span class="order_id">ID Order: 220220220898382858881</span>
            <span class="harga">Rp 89.000</span>
            <span class="jumlah">Total Buku: 1</span>
        </div>
    </div>

    <!--Contoh implementasi box lain-->
    <div class="transparent-container2">
        <span class="tanggal_order2">22 Feb 2022</span>
        <div class="transparan2">
            <div class="box2"></div>
            <span class="order_id2">ID Order: 220220220898382858881</span>
            <span class="harga2">Rp 89.000</span>
            <span class="jumlah2">Total Buku: 1</span>
        </div>
        <div class="transparan3">
            <div class="box3"></div>
            <span class="order_id3">ID Order: 220220220898382858881</span>
            <span class="harga3">Rp89.000</span>
            <span class="jumlah3">Total Buku: 1</span>
        </div>
    </div>
    <!---->
</div>
@endsection