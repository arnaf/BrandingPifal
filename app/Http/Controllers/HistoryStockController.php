<?php

namespace App\Http\Controllers;

use App\Models\HistoryStok;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class HistoryStockController extends Controller
{
    public function index(Request $request) {
    $detail = HistoryStok::Join('drugs', 'history_stoks.drug_id', '=', 'drugs.id')

        ->Join('users', 'history_stoks.user_id', '=', 'users.id')
        ->select([
            'history_stoks.*', 'drugs.name', 'users.id as user_id',
        ])
        ->orderby('id','desc')
        ->get();

        if(request()->ajax()) {
            return datatables()->of(HistoryStok::select('*'))


            ->addColumn('action', 'companies.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);



            }


                return view('history_stoks.index',compact('detail'));


        }

        public function getHistories(Request $request)
        {
            if ($request->ajax()) {
                //$data = HistoryStok::latest()->get();
                $data =
                Product::Join('v_history', 'v_history.drug_id', '=', 'drugs.id')

                ->Join('users', 'v_history.user_id', '=', 'users.id')
                ->select([
                    'v_history.*', 'drugs.name', 'users.email as user_id',
                ])
                ->orderby('id','desc')
                ->get();

                // $data= DB::table('v_history')

                // ->get();
                return Datatables::of($data)
                // ->addColumn(
                // 'total','total'

                //     )
                    ->addColumn('waktu', function($data) {
                        // return $data->created_at->diffForHumans();
                        return waktu($data->created_at);
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

   

}
