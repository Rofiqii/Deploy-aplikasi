@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div class="card">
                <div class="card-body">
                    <form id="vitalSignForm" action="{{ route('vital-sign.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <label for="assessment_id" class="form-label">ID Domba</label>
                                <input type="hidden" name="assessment_id" id="assessment_id" value="{{ $ass->id }}">
                                <input type="text" name="sheep_name" id="sheep_name" value="{{ $ass->sheep->id }} - {{ $ass->sheep->sheep_name }}" class="form-control" readonly>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <label for="assessor" class="form-label">Nama Assessor</label>
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="text" name="assessor" id="assessor" value="{{ Auth::user()->name }}" class="form-control" readonly>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <label for="check_date" class="form-label">Tanggal Pemeriksaan</label>
                                <input type="text" name="check_date" id="date_time" class="form-control" readonly>
                            </div>  
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-4">
                                <div class="mb-4">
                                    <label for="temperature" class="form-label">Suhu</label>
                                    <input type="number" name="temperature" id="temperature" value="{{ old('temperature') }}" class="form-control @error('temperature') is-invalid @enderror">
                                    @error('temperature')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="heart_rate" class="form-label">Detak Jantung</label>
                                    <input type="number" name="heart_rate" id="heart_rate" value="{{ old('heart_rate') }}" class="form-control @error('heart_rate') is-invalid @enderror">
                                    @error('heart_rate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="respiratory_rate" class="form-label">Laju Pernapasan</label>
                                    <input type="number" name="respiratory_rate" id="respiratory_rate" value="{{ old('respiratory_rate') }}" class="form-control @error('respiratory_rate') is-invalid @enderror">
                                    @error('respiratory_rate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="weight" class="form-label">Berat</label>
                                    <input type="number" name="weight" id="weight" value="{{ old('weight') }}" class="form-control @error('weight') is-invalid @enderror">
                                    @error('weight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                {{-- <div class="mb-4">
                                    <label for="status_condition" class="form-label">Kondisi Status</label>
                                    <input type="text" name="status_condition" id="statusCondition" class="form-control" readonly>
                                    @error('status_condition')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> --}}
                                <div class="mb-4">
                                    <label for="additional_info" class="form-label">Keterangan Lain</label>
                                    <textarea name="additional_info" id="additional_info" rows="5" class="form-control @error('additional_info') is-invalid @enderror">{{ old('additional_info') }}</textarea>
                                    @error('additional_info')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-3">
                                <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
