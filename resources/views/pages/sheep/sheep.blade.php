@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
      
      <div class="d-flex justify-content-end mb-3">
        <div>
            <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
        </div>
        <div>
            <a href="{{ route('sheep.create') }}" class="btn btn-primary ms-2">Tambah</a>
        </div>
      </div>
      
      <div class="row" id="sheep-list">
        @foreach ($sheep as $shp)
        <div class="sheep-item col-md-4 mb-3">
          <div class="card d-flex flex-row align-items-center p-4 shadow-lg">
            @if ($shp->sheep_photo)
                <img src="{{ asset('storage/' . $shp->sheep_photo) }}" class="img-fluid rounded me-3 fixed-img">
            @else
                <img src="{{ asset('assets/images/sheep/sheep_vector.jpeg') }}" class="img-fluid rounded me-3 fixed-img">
            @endif
            <div class="card-body p-1">
              <a href="/sheep/{{ $shp->id }}" class="card-title link-primary fw-semibold text-dark">{{ $shp->id }}</a>
              <p class="card-text">{{ $shp->sheep_name }}</p>
            </div>
            <div class="dropdown dropdown-top-right">
              <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li>
                    <a href="{{ route('sheep.edit', $shp->id) }}" class="dropdown-item d-flex align-items-center">
                        <iconify-icon icon="solar:pen-new-square-outline" class="fs-5 me-2"></iconify-icon>
                        Edit
                    </a>
                </li>
                <li>
                    <a href="{{ route('sheep.destroy', $shp->id) }}" class="dropdown-item d-flex align-items-center" data-confirm-delete>
                        <iconify-icon icon="solar:trash-bin-2-outline" class="fs-5 me-2"></iconify-icon>
                        Hapus
                    </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="text-xs text-gray-700">
            Showing
            {{ $sheep->firstItem() }}
            to
            {{ $sheep->lastItem() }}
            of
            {{ $sheep->total() }}
        </div>
        <div>
            {{ $sheep->links('pagination::bootstrap-4') }}
        </div>
      </div>
    
    </div>
  </div>
</div>
@endsection