@extends('layouts.admin')

@section('content')
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Edit Kasir</h2>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form action="{{ route('kasir.update', $cashier->id) }}" method="post">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $cashier->name }}"
                        autofocus>
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username"
                        value="{{ $cashier->username }}">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" type="submit">
                        <i class="bx bx-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('kasir.index') }}" class="btn btn-light">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
