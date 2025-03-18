@extends('layouts.master')

@section('content')
<form action="{{ route('user.store') }}" method="POST">
  @csrf
  <div class="col-12">
    <div class="card">
      <div class="px-4 py-3 border-bottom">
          <h4 class="card-title mb-0">{{ $title }}</h4>
      </div>
      <div class="card-body p-4 border-bottom">
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-4">
              <label for="name" class="form-label">Nama</label>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
  
            <div class="mb-4">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>
  
            <div>
              <label for="role" class="form-label">Role</label>
              <select class="form-select @error('role') is-invalid @enderror" name="role" id="role" aria-label="Default select example">
                <option selected disabled>Pilih Role</option>
                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Karyawan" {{ old('role') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
              </select>
              @error('role')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
          </div>
  
          <div class="col-lg-6">
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>
  
            <div>
              <label for="confirm_password" class="form-label">Confirm Password</label>
              <div class="input-group">
                <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror">
                @error('confirm_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-bo dy p-4">
          <div class="col-12">
              <div class="d-flex align-items-center gap-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
      </div>
    </div>
  </div>
</form>
@endsection