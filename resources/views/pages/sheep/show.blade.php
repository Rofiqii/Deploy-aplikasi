@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">{{ $title }}</h4>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body">
                            <strong>Foto Domba</strong>
                            <div class="mt-3 mb-3 d-flex justify-content-center">
                                @if ($sheep->sheep_photo)
                                    <img src="{{ asset('storage/' . $sheep->sheep_photo) }}" class="img-fluid rounded fixed-img-create">
                                @else
                                    <img src="{{ asset('assets/images/sheep/sheep_vector.jpeg') }}" class="img-fluid rounded fixed-img-create">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 d-flex align-items-stretch">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <strong>ID Domba:</strong>
                                <p>{{ $sheep->id }}</p>
                            </div>
                            <div class="mb-4">
                                <strong>Nama Domba:</strong>
                                <p>{{ $sheep->sheep_name }}</p>
                            </div>
                            <div class="mb-4">
                                <strong>Tanggal Lahir:</strong>
                                <p>{{ \Carbon\Carbon::parse($sheep->sheep_birth)->format('d F Y') }}</p>
                            </div>
                            <div class="mb-4">
                                <strong>Jenis Kelamin Domba:</strong>
                                <p>{{ $sheep->sheep_gender }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4 text-center">
                            <div class="mb-4 d-flex justify-content-center">
                                {!! $qrCode !!}
                            </div>
                            <a href="{{ route('sheep.download', $sheep->id) }}" class="btn btn-outline-primary">Download QR Code</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('sheep.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
