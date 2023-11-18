<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\card;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = card::all();
        return view('home', compact('data'));
    }

    public function insertdata(Request $request)
    {
        //dd($request->all());
        $data = card::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('home');
    }

    public function showdata($id){
        $data = card::find($id);
        //dd($data);
        return view('showdata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = card::find($id);
        $data->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('home');
    }

    public function delete($id){
        $data = card::find($id);
        $data->delete();
        return redirect()->route('home');
    }
}
