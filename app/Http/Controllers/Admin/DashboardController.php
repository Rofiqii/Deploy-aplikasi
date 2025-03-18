<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sheep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahDomba = Sheep::count();
        $jumlahDombaJantan = Sheep::where('sheep_gender', 'Jantan')->count();
        $jumlahDombaBetina = Sheep::where('sheep_gender', 'Betina')->count();

        return view('pages.dashboard', compact('jumlahDomba', 'jumlahDombaJantan', 'jumlahDombaBetina'));
    }

    public function getChartData(Request $request)
    {
        $year = $request->query('year', date('Y'));

    
        $data = DB::table('radiologies')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw("SUM(CASE WHEN pregnancy_status = 'Bunting' THEN 1 ELSE 0 END) as pregnant"),
                DB::raw("SUM(CASE WHEN pregnancy_status = 'Tidak Bunting' THEN 1 ELSE 0 END) as not_pregnant")
            )
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->get();
            
        return response()->json($data);
    }
}