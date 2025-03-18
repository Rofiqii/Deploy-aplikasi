@extends('layouts.main-auth')

@section('content-auth')
<div class="d-flex flex-column gap-2">
  <h2 class="">Selamat Datang</h2>
  <p class="fs-3 fw-normal text-body-color">Silakan masuk dengan mengisi data Anda di bawah ini</p>
  @if (session()->has('error'))
      <div id="error-alert" class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
          <strong>Error!</strong> {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif
</div>
  <form method="POST" action="{{ route('auth') }}">
    @csrf
    <div class="mb-4">
      <label for="email" class="form-label fw-semibold fs-3 text-dark">Email</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control rounded-5 text-dark @error('email') is-invalid @enderror">
      @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-4">
      <div class="d-flex align-items-center justify-content-between">
        <label for="password" class="form-label fw-semibold fs-3 text-dark">Password</label>
        {{-- <a href="#" class="fw-normal fs-2 text-primary link-dark">Forgot your
          password?</a> --}}
      </div>
      <input type="password" name="password" id="password" class="form-control rounded-5 text-dark @error('password') is-invalid @enderror">
      @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary w-100 py-8 rounded-pill">Sign In</button>
  </form>
@endsection