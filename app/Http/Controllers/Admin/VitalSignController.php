<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VitalSignRequest;
use App\Models\InitialAssessment;
use App\Models\VitalSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class VitalSignController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $title = 'Hapus!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('pages.vital-sign.vital', [
            'title' => 'Data Tanda Vital',
            'vitalsign' => VitalSign::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $initialAssessment = InitialAssessment::latest()->first();
        $vitalSignExists = VitalSign::where('assessment_id', $initialAssessment->id)->exists();

        if ($vitalSignExists && $initialAssessment) {
            Alert::info('Info', 'Mohon isi Pemeriksaan Awal terlebih dahulu sebelum melanjutkan pengisian Tanda Vital.');
            return redirect()->route('vital-sign.index');
        }

        return view('pages.vital-sign.create', [
            'title' => 'Tambah Data Tanda Vital',
            'ass' => $initialAssessment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VitalSignRequest $request) {
        $data = $request->validated();

        if ($request->has('status_condition')) {
            $data['status_condition'] = $request->input('status_condition');
        }
        VitalSign::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Tanda Vital berhasil disimpan!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return view('pages.vital-sign.show', [
            'title' => 'Detail Tanda Vital',
            'vitalSign' => VitalSign::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        // dd($id);
        return view('pages.vital-sign.edit', [
            'title' => 'Ubah Tanda Vital',
            'vs' => VitalSign::find($id),
            'assessment' => InitialAssessment::with('sheep')->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VitalSignRequest $request, $id) {
        $vitalSign = VitalSign::find($id);
        $vitalSign->update($request->validated());

        Alert::success('Berhasil!', 'Data Domba berhasil diubah.');
        return redirect('/vital-sign');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        VitalSign::destroy($id);
        Alert::success('Berhasil!', 'Data Tanda Vital berhasil dihapus.');
        return redirect('/vital-sign');
    }

    public function predictHealth(Request $request) {
        $initialAssessment = InitialAssessment::latest()->first();
        $data = [
            'Suhu Tubuh (°C)' => $request->input('temperature'),
            'Frekuensi Pernapasan (x/menit)' => $request->input('respiratory_rate'),
            'Detak Jantung (x/menit)' => $request->input('heart_rate'),
            'Kuku' => $initialAssessment->hoof,
            'Mata' => $initialAssessment->eye,
            'Bulu' => $initialAssessment->wool
        ];

        try {
            $response = Http::post('http://127.0.0.1:5000/predict-health', $data);

            if ($response->successful()) {
                return response()->json([
                    'status' => 'success',
                    'prediction' => $response->json()['predict']
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
