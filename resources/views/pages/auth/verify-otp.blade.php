@extends('layouts.main-auth')

@section('content-auth')    
<div class="card-body">
  <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
    <img src="{{ asset('assets/images/logos/logo-gmf.png') }}" width="180" alt="">
  </a>
  <p class="text-center">CV Gumukmas Multi Farm</p>

  @if (session()->has('error'))
      <div id="error-alert" class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
          <strong>Error!</strong> {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif

  <form method="POST" action="">
    @csrf

    {{-- 6-digit OTP input boxes --}}
    <div class="mb-4 d-flex justify-content-center gap-2">
      @for ($i = 1; $i <= 6; $i++)
          <input type="text" name="otp[]" maxlength="1" class="form-control otp-input text-center" style="width: 50px; font-size: 1.5rem;" required>
      @endfor
    </div>

    @error('otp')
      <div class="invalid-feedback d-block text-center mb-3">
          {{ $message }}
      </div>
    @enderror

    <button type="submit" class="btn btn-primary w-100 py-2 fs-4 mb-4 rounded-2">Verify OTP</button>
  </form>

  <div class="d-flex align-items-center justify-content-end mb-4">
    <a class="text-primary fw-bold" href="#">Resend OTP?</a>
  </div>
</div>

{{-- Script for handling OTP input focus --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const otpInputs = document.querySelectorAll('.otp-input');

    otpInputs.forEach((input, index) => {
      input.addEventListener('input', function() {
        if (input.value.length === 1 && index < otpInputs.length - 1) {
          otpInputs[index + 1].focus();
        }
      });

      input.addEventListener('keydown', function(event) {
        if (event.key === 'Backspace' && input.value.length === 0 && index > 0) {
          otpInputs[index - 1].focus();
        }
      });
    });
  });
</script>
@endsection
