<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RadiologyResource;
use App\Models\Radiology;
use Illuminate\Http\Request;

class RadiologyController extends Controller {
    
    public function index() {
        $radiology = Radiology::with('assessment')
                    ->orderBy('created_at', 'desc')
                    ->get();
        return response()->json([
            'success' => true,
            'data' => RadiologyResource::collection($radiology),
        ], 200);
    }

    public function show($id) {
        $radiology = Radiology::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new RadiologyResource($radiology),
        ], 200);
    }
}
