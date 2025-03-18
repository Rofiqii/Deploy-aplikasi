@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Detail Data Tanda Vital</h4>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <strong>ID Domba:</strong>
                        <p>{{ $vitalSign->assessment->sheep_id }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Nama Domba:</strong>
                        <p>{{ $vitalSign->assessment->sheep->sheep_name }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Nama Assessor:</strong>
                        <p>{{ $vitalSign->assessment->user->name }}</p>
                    </div>
                    <div class="mb-4">
                        <strong>Tanggal Pemeriksaan:</strong>
                        <p>{{ \Carbon\Carbon::parse($vitalSign->assessment->created_at)->format('d F Y | H:i:s') }}</p>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="mb-4">
                        <strong>Suhu:</strong>
                        <p>{{ $vitalSign->temperature }} °C</p>
                    </div>
                    <div class="mb-4">
                        <strong>Denyut Jantung:</strong>
                        <p>{{ $vitalSign->heart_rate }} bpm</p>
                    </div>
                    <div class="mb-4">
                        <strong>Laju Pernapasan:</strong>
                        <p>{{ $vitalSign->respiratory_rate }} per menit</p>
                    </div>
                    <div class="mb-4">
                        <strong>Berat:</strong>
                        <p>{{ $vitalSign->weight }} kg</p>
                    </div>
                    <div class="mb-4">
                        <strong>Kondisi Status:</strong><br>
                        @if ($vitalSign->status_condition == 'Sehat')
                        <span class="badge bg-success-subtle text-success">{{ $vitalSign->status_condition }}</span>
                        @else
                        <span class="badge bg-danger-subtle text-danger">{{ $vitalSign->status_condition }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-end">
                        <a href="/vital-sign" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
