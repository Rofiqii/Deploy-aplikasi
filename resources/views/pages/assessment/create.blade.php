@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('assessment.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <label for="sheep_id" class="form-label">ID Domba</label>
                                <select id="sheep_id" name="sheep_id" class="form-control js-example-basic-single @error('sheep_id') is-invalid @enderror">
                                    <option selected disabled></option>
                                    @foreach($sheep as $shp)
                                        <option value="{{ $shp->id }}" {{ old('sheep_id') == $shp->id ? 'selected' : '' }}>{{ $shp->id }} - {{ $shp->sheep_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sheep_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
                                    <label for="hoof" class="form-label">Kuku</label>
                                    <select name="hoof" id="hoof" class="form-control @error('hoof') is-invalid @enderror">
                                        <option selected disabled>Pilih Kondisi Kuku</option>
                                        <option value="normal" {{ old('hoof') == 'normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="bengkak" {{ old('hoof') == 'bengkak' ? 'selected' : '' }}>Bengkak</option>
                                        <option value="patah" {{ old('hoof') == 'patah' ? 'selected' : '' }}>Patah</option>
                                        <option value="terinfeksi" {{ old('hoof') == 'terinfeksi' ? 'selected' : '' }}>Terinfeksi</option>
                                        <option value="lembek" {{ old('hoof') == 'lembek' ? 'selected' : '' }}>Lembek</option>
                                        <option value="pecah" {{ old('hoof') == 'pecah' ? 'selected' : '' }}>Pecah</option>
                                    </select>
                                    @error('hoof')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="eye" class="form-label">Mata</label>
                                    <select name="eye" id="eye" class="form-control @error('eye') is-invalid @enderror">
                                        <option selected disabled>Pilih Kondisi Mata</option>
                                        <option value="normal" {{ old('eye') == 'normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="merah" {{ old('eye') == 'merah' ? 'selected' : '' }}>Merah</option>
                                        <option value="berair" {{ old('eye') == 'berair' ? 'selected' : '' }}>Berair</option>
                                        <option value="kuning" {{ old('eye') == 'kuning' ? 'selected' : '' }}>Kuning</option>
                                        <option value="pucat" {{ old('eye') == 'pucat' ? 'selected' : '' }}>Pucat</option>
                                        <option value="bengkak" {{ old('eye') == 'bengkak' ? 'selected' : '' }}>Bengkak</option>
                                        <option value="terinfeksi" {{ old('eye') == 'terinfeksi' ? 'selected' : '' }}>Terinfeksi</option>
                                    </select>
                                    @error('eye')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="wool" class="form-label">Bulu</label>
                                    <select name="wool" id="wool" class="form-control @error('wool') is-invalid @enderror">
                                        <option selected disabled>Pilih Kondisi Bulu</option>
                                        <option value="normal" {{ old('wool') == 'normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="kering" {{ old('wool') == 'kering' ? 'selected' : '' }}>Kering</option>
                                        <option value="rontok" {{ old('wool') == 'rontok' ? 'selected' : '' }}>Rontok</option>
                                        <option value="berjamur" {{ old('wool') == 'berjamur' ? 'selected' : '' }}>Berjamur</option>
                                    </select>
                                    @error('wool')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>                                
                            </div>
                            <div class="col-lg-6">
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
