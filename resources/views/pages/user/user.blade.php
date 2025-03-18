@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div class="d-flex justify-content-end mb-3">
                <div>
                    <input type="text" name="search" class="form-control search-input" data-table-id="table-user" placeholder="Search...">
                </div>
                <div>
                    <a href="{{ route('user.create') }}" class="btn btn-primary ms-2">Tambah</a>
                </div>
            </div>

            <div class="table-responsive" id="table-user">
                <table class="table rounded-3 overflow-hidden">
                    <thead class="table-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if ($user->photo)
                                        <img src="{{ asset('storage/' . $user->photo) }}" class="rounded-circle" width="40" height="40" style="object-fit: cover; margin-right: 10px;">
                                    @else
                                        <img src="{{ asset('assets/images/profile/user_profile.jpeg') }}" class="rounded-circle" width="40" height="40" style="object-fit: cover; margin-right: 10px;">
                                    @endif
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm me-2">
                                    <iconify-icon icon="solar:pen-new-square-outline" class="fs-5"></iconify-icon>
                                </a>
                                <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger btn-sm" data-confirm-delete>
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
