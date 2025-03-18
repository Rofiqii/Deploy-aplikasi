@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
      
      <div class="d-flex justify-content-end mb-3">
        <div>
          <input type="text" name="search" class="form-control search-input" data-table-id="table-vitalsign" placeholder="Search...">
        </div>
        <div>
            <a href="{{ route('vital-sign.create') }}" class="btn btn-primary ms-2">Tambah</a>
        </div>
      </div>
      
      <div class="table-responsive" id="table-vitalsign">
        <table class="table rounded-3 overflow-hidden">
          <thead class="table-primary text-white">
            <tr>
                <th>No</th>
                <th>Tanggal Periksa</th>
                <th>ID Domba</th>
                <th>Nama Domba</th>
                {{-- <th>Suhu</th>
                <th>Denyut jantung</th>
                <th>Laju Pernapasan</th>
                <th>Berat</th> --}}
                <th>Status Kesehatan</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($vitalsign as $index => $vs)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ Carbon\Carbon::parse($vs->assessment->created_at)->format('d-m-Y H:i:s') }}</td>
                <td>{{ $vs->assessment->sheep_id }}</td>
                <td>{{ $vs->assessment->sheep->sheep_name }}</td>
                {{-- <td style="text-align: center;">{{ $vs->temperature }} C</td>
                <td style="text-align: center;">{{ $vs->heart_rate }}</td>
                <td style="text-align: center;">{{ $vs->respiratory_rate }}</td>
                <td>{{ $vs->weight }}kg</td> --}}
                <td>
                  @if ($vs->status_condition == 'Sehat')
                  <span class="badge bg-success-subtle text-success">{{ $vs->status_condition }}</span>
                  @else
                  <span class="badge bg-danger-subtle text-danger">{{ $vs->status_condition }}</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('vital-sign.edit', $vs->id) }}" class="btn btn-info btn-sm me-2">
                    <iconify-icon icon="solar:pen-new-square-outline" class="fs-5"></iconify-icon>
                  </a>
                  <a href="{{ route('vital-sign.show', $vs->id) }}" class="btn btn-warning btn-sm me-2">
                      <iconify-icon icon="solar:eye-outline" class="fs-5"></iconify-icon>
                  </a>
                  <a href="{{ route('vital-sign.destroy', $vs->id) }}" class="btn btn-danger btn-sm" data-confirm-delete>
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
              {{ $vitalsign->firstItem() }}
              to
              {{ $vitalsign->lastItem() }}
              of
              {{ $vitalsign->total() }}
          </div>
          <div>
              {{ $vitalsign->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    
    </div>
  </div>
</div>
@endsection