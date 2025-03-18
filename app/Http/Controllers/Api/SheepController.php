<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SheepRequest;
use App\Http\Resources\SheepResource;
use App\Models\Sheep;

class SheepController extends Controller {
    
    public function index() {
        $sheep = Sheep::orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => SheepResource::collection($sheep),
        ], 200);
    }

    public function show($id) {
        $sheep = Sheep::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new SheepResource($sheep),
        ], 200);
    }

    public function store(SheepRequest $request) {
        $validatedData = $request->validated();
        $validatedData['id'] = Sheep::generateUniqueSheepId();

        if ($request->hasFile('sheep_photo')) {
            $validatedData['sheep_photo'] = $request->file('sheep_photo')->store('sheep_photos', 'public');
        }

        $sheep = Sheep::insert([$validatedData]);
        return response()->json([
            'success' => true,
            'data' => $sheep,
        ], 201);
    }
}
