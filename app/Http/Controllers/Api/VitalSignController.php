<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VitalSignResource;
use App\Models\VitalSign;
use Illuminate\Http\Request;

class VitalSignController extends Controller {
    
    public function index() {
        $vital = VitalSign::with('assessment')
                ->whereIn('assessment_id', function ($query) {
                    $query->selectRaw('MAX(id)')
                          ->from('initial_assessments')
                          ->groupBy('sheep_id');
                })
                ->orderBy('created_at', 'desc')
                ->get();
            

        return response()->json([
            'success' => true,
            'data' => VitalSignResource::collection($vital),
        ], 200);
    }

    public function show($id) {
        $vital = VitalSign::with('assessment')
                ->whereHas('assessment', function ($query) use ($id) {
                    $query->where('sheep_id', $id);
                })
                ->orderBy('created_at', 'desc')
                ->get();

        return response()->json([
            'success' => true,
            'data' => VitalSignResource::collection($vital)
        ], 200);
    }
}
