<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $title = 'Hapus!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        
        return view('pages.user.user', [
            'title' => 'Manajemen Pengguna',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('pages.user.create', [
            'title' => 'Tambah Data Pengguna'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request) {
        // dd($request->all());
        User::create($request->validated());
        Alert::success('Berhasil!', 'Data Pengguna berhasil disimpan.');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        return view('pages.user.edit', [
            'title' => 'Ubah Data Domba',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user) {
        $validatedData = $request->validated();

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }
        $user->update($validatedData);

        Alert::success('Berhasil!', 'Data Pengguna berhasil diubah.');
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        User::destroy($user->id);
        Alert::success('Berhasil!', 'Data Pengguna berhasil dihapus.');
        return redirect('/user');
    }
}
