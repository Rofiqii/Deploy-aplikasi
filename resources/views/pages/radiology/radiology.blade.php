@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Data Radiologi USG</h5>

                <div class="d-flex justify-content-end mb-3">
                    <div>
                        <input type="text" name="search" class="form-control search-input" data-table-id="table-radiology" placeholder="Search...">
                    </div>
                    <div>
                        <a href="{{ route('radiology.create') }}" class="btn btn-primary ms-2">Tambah</a>
                    </div>
                </div>

                <div class="table-responsive" id="table-radiology">
                    <table class="table rounded-3 overflow-hidden">
                        <thead class="table-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>ID Domba</th>
                            <th>Nama Domba</th>
                            {{-- <th>Usia Kandungan</th> --}}
                            <th>Status Kehamilan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($radiologies as $index => $rad)
                            <tr>  
                                <td>{{ $index + 1 }}</td>
                                <td>{{ Carbon\Carbon::parse($rad->assessment->created_at)->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $rad->assessment->sheep_id }}</td>
                                <td>{{ $rad->assessment->sheep->sheep_name }}</td>
                                {{-- <td>{{ $rad->gestational_age }} minggu</td> --}}                                
                                <td>
                                    @if ($rad->pregnancy_status == 'Bunting')
                                    <span class="badge bg-success-subtle text-success">{{ $rad->pregnancy_status }}</span>
                                    @else
                                    <span class="badge bg-warning-subtle text-warning">{{ $rad->pregnancy_status }}</span>
                                    @endif                      
                                </td>
                                <td>
                                    <a href="{{ route('radiology.edit', $rad->id) }}" class="btn btn-info btn-sm me-2">
                                        <iconify-icon icon="solar:pen-new-square-outline" class="fs-5"></iconify-icon>
                                    </a>
                                    <a href="{{ route('radiology.show', $rad->id) }}" class="btn btn-warning btn-sm me-2">
                                        <iconify-icon icon="solar:eye-outline" class="fs-5"></iconify-icon>
                                    </a>
                                    <a href="{{ route('radiology.destroy', $rad->id) }}" class="btn btn-danger btn-sm" data-confirm-delete>
                                        <iconify-icon icon="solar:trash-bin-2-outline" class="fs-5"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
