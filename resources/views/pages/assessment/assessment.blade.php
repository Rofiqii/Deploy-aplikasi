@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Pemeriksaan Awal</h5>

            <div class="d-flex justify-content-end mb-3">
                <div>
                    <input type="text" name="search" class="form-control search-input" data-table-id="table-assessment" placeholder="Search...">
                </div>
                <div>
                    <a href="{{ route('assessment.create') }}" class="btn btn-primary ms-2">Tambah</a>
                </div>
            </div>

            <div class="table-responsive" id="table-assessment">
                <table class="table rounded-3 overflow-hidden">
                    <thead class="table-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Periksa</th>
                            <th>ID Domba</th>
                            <th>Nama Domba</th>
                            <th>Nama Assesor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessments as $index => $assessment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ Carbon\Carbon::parse($assessment->created_at)->format('d-m-Y H:i:s') }}</td>
                            <td>{{ $assessment->sheep_id }}</td>
                            <td>{{ $assessment->sheep->sheep_name }}</td>
                            <td>{{ $assessment->user->name }}</td>
                            <td>
                                <a href="{{ route('assessment.edit', $assessment->id) }}" class="btn btn-info btn-sm me-2">
                                    <iconify-icon icon="solar:pen-new-square-outline" class="fs-5"></iconify-icon>
                                </a>
                                <a href="{{ route('assessment.show', $assessment->id) }}" class="btn btn-warning btn-sm me-2">
                                    <iconify-icon icon="solar:eye-outline" class="fs-5"></iconify-icon>
                                </a>
                                <a href="{{ route('assessment.destroy', $assessment->id) }}" class="btn btn-danger btn-sm" data-confirm-delete>
                                    <iconify-icon icon="solar:trash-bin-2-outline" class="fs-5"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-xs text-gray-700">
                        Showing
                        {{ $assessments->firstItem() }}
                        to
                        {{ $assessments->lastItem() }}
                        of
                        {{ $assessments->total() }}
                    </div>
                    <div>
                        {{ $assessments->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
