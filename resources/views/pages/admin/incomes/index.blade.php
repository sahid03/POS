@extends('layouts.admin')

@section('content')
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Pendapatan</h2>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Pesanan</th>
                            <th>Nama Kasir</th>
                            <th>Nama Pelanggan</th>
                            <th>Item</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($incomes as $item)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{ $item->id }}</td>
                                <td>{{ $item->cashier->name }}</td>
                                <td>{{ $item->customer_name }}</td>
                                <td>{{ $item->details->count() }} Item</td>
                                <td>Rp. {{ number_format($item->total) }}</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-primary btn-sm py-1 px-3 rounded-1"
                                            data-bs-toggle="modal" data-bs-target="#detail">
                                            <i class="bx bx-info-circle"></i> Detail Pesanan
                                        </button>
                                        <a href="#" class="btn btn-success btn-sm py-1 px-3 rounded-1">
                                            <i class="bx bx-printer"></i> Cetak
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            @php
                                $total += $item->total;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end">Total</td>
                            <td class="fw-semibold">Rp. {{ number_format($total) }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Detail Pesanan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-1 text-secondary text-uppercase fw-medium fs-7">Detail Produk</p>
                    <div class="row mt-2">
                        <div class="col-7">
                            <p class="mb-0 text-dark fw-semibold">Cheesey Chicken</p>
                            <p class="mb-0 text-secondary fs-7">Rp. 35,000</p>
                        </div>
                        <div class="col-5">
                            <p class="mb-0 text-dark text-end fw-semibold">Rp. 35,000</p>
                            <p class="mb-0 text-secondary text-end fs-7">1x</p>
                        </div>
                    </div>

                    <!-- Start Cut -->
                    <div class="row mt-2">
                        <div class="col-7">
                            <p class="mb-0 text-dark fw-semibold">Row Marbled Meat Steak</p>
                            <p class="mb-0 text-secondary fs-7">Rp. 34,000</p>
                        </div>
                        <div class="col-5">
                            <p class="mb-0 text-dark text-end fw-semibold">Rp. 68,000</p>
                            <p class="mb-0 text-secondary text-end fs-7">2x</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">
                            <p class="mb-0 text-dark fw-semibold">Maxi Burger</p>
                            <p class="mb-0 text-secondary fs-7">Rp. 42,000</p>
                        </div>
                        <div class="col-5">
                            <p class="mb-0 text-dark text-end fw-semibold">Rp. 126,000</p>
                            <p class="mb-0 text-secondary text-end fs-7">3x</p>
                        </div>
                    </div>
                    <!-- Batas Cut -->

                    <hr class="my-4" style="border-style: dashed;">
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <p class="mb-0 text-secondary">Subtotal</p>
                        <p class="mb-0 text-dark fw-semibold">Rp. 229,000</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <p class="mb-0 text-secondary">Pajak</p>
                        <p class="mb-0 text-dark fw-semibold">Rp. 12,000</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <p class="mb-0 text-secondary">Total</p>
                        <p class="mb-0 text-dark fw-semibold">Rp. 241,000</p>
                    </div>
                    <hr class="my-4" style="border-style: dashed;">
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <p class="mb-0 text-secondary">Cash</p>
                        <p class="mb-0 text-dark fw-semibold">Rp. 250,000</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <p class="mb-0 text-secondary">Kembali</p>
                        <p class="mb-0 text-dark fw-semibold">Rp. 9,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
