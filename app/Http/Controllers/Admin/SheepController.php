<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SheepRequest;
use App\Models\Sheep;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SheepController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $title = 'Hapus!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('pages.sheep.sheep',
        [
            'title' => 'Data Domba',
            'sheep' => Sheep::orderBy('created_at', 'desc')->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $id = Sheep::generateUniqueSheepId();
        return view('pages.sheep.create', compact('id'), [
            'title' => 'Tambah Data Domba'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SheepRequest $request) {
        $validatedData = $request->validated();
        $validatedData['id'] = Sheep::generateUniqueSheepId();
        
        if ($request->hasFile('sheep_photo')) {
            $validatedData['sheep_photo'] = $request->file('sheep_photo')->store('sheep_photos', 'public');
        }
        Sheep::insert([$validatedData]);
        Alert::success('Berhasil!', 'Data Domba berhasil disimpan.');
        return redirect('/sheep');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sheep $sheep) {
        return view('pages.sheep.show', [
            'title' => 'Detail Data Domba',
            'sheep' => Sheep::findOrFail($sheep->id),
            'qrCode' => QrCode::size(300)->generate($sheep->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sheep $sheep) {
        return view('pages.sheep.edit', [
            'title' => 'Ubah Data Domba',
            'sheep' => $sheep
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SheepRequest $request, Sheep $sheep) {
        $validatedData = $request->validated();

        if ($request->hasFile('sheep_photo')) {          
            if ($sheep->sheep_photo) {
                Storage::disk('public')->delete($sheep->sheep_photo);
            }
            $validatedData['sheep_photo'] = $request->file('sheep_photo')->store('sheep_photos', 'public');
        }
    
        $sheep->update($validatedData);
        Alert::success('Berhasil!', 'Data Domba berhasil diubah.');
        return redirect('/sheep');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sheep $sheep) {
        if ($sheep->sheep_photo) {
            Storage::disk('public')->delete($sheep->sheep_photo);
        }    
        $sheep->delete();

        Alert::success('Berhasil!', 'Data Domba berhasil dihapus.');
        return redirect('/sheep');
    }

    public function downloadQrCode($id) {
        // // harus install imagick
        // $sheep = Sheep::findOrFail($id);
        // $qrCode = QrCode::format('png')->size(300)->generate($sheep->id);
        // $fileName = 'qrcode' . str_pad($id, 3, '0', STR_PAD_LEFT) . '.png';
        // return response($qrCode, 200)
        //     ->header('Content-Type', 'image/png')
        //     ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');

        $sheep = Sheep::findOrFail($id);
        $pdf = Pdf::loadview('pages.sheep.pdf', compact('sheep'));
        $fileName = 'qrcode' . str_pad($id, 3, '0', STR_PAD_LEFT) . '.pdf';
        return $pdf->download($fileName);
    }
}