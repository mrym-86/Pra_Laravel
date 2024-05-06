<?php

namespace App\Http\Controllers;

use App\Models\Stationery;
use App\Models\Classification;
use Illuminate\Http\Request;

class StationeryController extends Controller
{
    public function index()
    {
        $Stationeries = Stationery::select([
            'S.id',
            'S.name',
            'S.price',
            'S.details',
            'C.str as classification',
        ])
        ->from ('Stationeries as S')
        ->join ('classifications as C',function($join)
        {$join -> on('S.classification', '=' ,'C.id');})
        -> orderBy ('S.id','DESC')
        ->paginate(5);

        return view('index',compact('Stationeries'))
            ->with('page_id',request()->page)
            ->with('i',(request()->input('page',1)-1)*5);
    }


    public function create()
    {
        $Classifications = Classification::all();
        return view('create')
            ->with('Classifications',$Classifications);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'price' => 'required|integer',
            'classification' =>'required|integer',
            'details' => 'required|max:140',
        ]);

        $stationery = new Stationery;
        $stationery->name = $request->input(["name"]);
        $stationery->price = $request->input(["price"]);
        $stationery->classification = $request->input(["classification"]);
        $stationery->details = $request->input(["details"]);
        $stationery->save();

        return redirect()->route('Stationeries.index');
    }


    public function edit(Stationery $stationery){
        $classifications = Classification::all();
        return view('edit',compact('stationery'))
        ->with('page_id',request()->page_id)
        ->with('classifications',$classifications);
    }


    public function update(Request $request, Stationery $stationery){
        $request->validate([
            'name' => 'required|max:20',
            'price' => 'required|integer',
            'classification' =>'required|integer',
            'details' => 'required|max:140',
        ]);

        $stationery->name = $request->input(["name"]);
        $stationery->price = $request->input(["price"]);
        $stationery->classification = $request->input(["classification"]);
        $stationery->details = $request->input(["details"]);
        /*$stationery->user_id = \Auth::user()->id;*/
        $stationery->save();

        return redirect() -> route('Stationeries.index')->with('success',$stationery->name.'を更新しました');
    }

    public function show(Stationery $stationery){
        $classifications = Classification::all();
        return view('show',compact('stationery'))
        ->with('page_id',request()->page_id)
        ->with('classifications',$classifications);
    }

    public function destroy(Stationery $stationery)
    {
        $stationery ->delete();
        return redirect() ->route('Stationeries.index')
                        ->with('success','文房具'.$stationery->name.'を削除しました');
    }

}