@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">{{ $title }}</h4>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <!-- Kolom kiri -->
                <div class="col-lg-6">
                    <div class="mb-4">
                        <strong>ID Domba:</strong>
                        <p>{{ $assessment->sheep_id }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Nama Domba:</strong>
                        <p>{{ $assessment->sheep->sheep_name }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Nama Assessor:</strong>
                        <p>{{ $assessment->user->name }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Tanggal Pemeriksaan:</strong>
                        <p>{{ \Carbon\Carbon::parse($assessment->created_at)->format('d F Y | H:i:s') }}</p>
                    </div>                    
                </div>

                <div class="col-lg-6">
                    <div class="mb-4">
                        <strong>Kondisi Kuku:</strong>
                        <p>{{ $assessment->hoof }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Kondisi Mata:</strong>
                        <p>{{ $assessment->eye }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Kondisi Bulu:</strong>
                        <p>{{ $assessment->wool }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Keterangan Lain:</strong>
                        <p>{{ $assessment->additional_info }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('assessment.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
