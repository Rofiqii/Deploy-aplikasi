@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">{{ $title }}</h4>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body">
                            <strong>Foto USG Domba</strong>
                            <div class="mt-3 mb-3 d-flex justify-content-center">
                                @if ($rad->ultrasound_image)
                                    <img src="{{ asset('storage/' . $rad->ultrasound_image) }}" class="img-fluid rounded fixed-img-create">
                                @else
                                    <img src="{{ asset('assets/images/sheep/placeholder.jpeg') }}" class="img-fluid rounded fixed-img-create">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <strong>ID Domba:</strong>
                                        <p>{{ $rad->assessment->sheep_id }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>Nama Domba:</strong>
                                        <p>{{ $rad->assessment->sheep->sheep_name }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>Nama Assessor:</strong>
                                        <p>{{ $rad->assessment->user->name }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>Tanggal Pemeriksaan:</strong>
                                        <p>{{ \Carbon\Carbon::parse($rad->assessment->created_at)->format('d F Y | H:i:s') }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    {{-- <div class="mb-4">
                                        <strong>Usia Kehamilan:</strong>
                                        <p>{{ $rad->gestational_age }} minggu</p>
                                    </div> --}}
                                    <div class="mb-4">
                                        <strong>Status Kehamilan:</strong><br>
                                        @if ($rad->pregnancy_status == 'Bunting')
                                        <span class="badge bg-success-subtle text-success">{{ $rad->pregnancy_status }}</span>
                                        @else
                                        <span class="badge bg-warning-subtle text-warning">{{ $rad->pregnancy_status }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <strong>Keterangan Lain:</strong>
                                        <p>{{ $rad->additional_info }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('radiology.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
