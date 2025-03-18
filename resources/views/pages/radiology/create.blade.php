@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div class="card">
                <div class="card-body">
                    <form id="radiologyForm" action="{{ route('radiology.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="pregnancy_status" class="form-label">Status Kebuntingan</label>
                                    {{-- <p id="predictionResultText">Waiting for upload...</p> --}}
                                    <input type="text" name="pregnancy_status" id="predictionResult" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="ultrasound_image" class="form-label">Foto USG</label>
                                    <div class="form-control mb-3 d-flex justify-content-center">
                                        <img src="{{ asset('assets/images/sheep/placeholder.jpeg') }}" class="img-preview img-fluid rounded fixed-img-create2">
                                    </div>
                                    <input type="file" id="ultrasound_image" name="ultrasound_image" data-url="{{ url('/predict-usg') }}" onchange="previewImage()" class="form-control @error('ultrasound_image') is-invalid @enderror">
                                    @error('ultrasound_image')
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
<script>
    function previewImage() {
      const image = document.querySelector('#ultrasound_image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>
@endsection
