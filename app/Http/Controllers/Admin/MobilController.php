<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Mobil;
use App\Merk;
use Alert;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::orderBy('created_at', 'Desc')->get();
        return view('admin.mobil.index', compact('mobil'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merks = Merk::all();
        return view('admin.mobil.tambah', compact('merks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
        'name' => 'required',
        'merk_id' => 'required',
        'warna' => 'required',
        'plat' => 'required',
        'filename' => 'required|image|max:2048',            
        ]);

        $image = $request->file('filename');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('asset/images/mobil'), $new_name);
        
        Mobil::create([
            'name' => $request->name,
            'merk_id' => $request->merk_id,
            'warna' => $request->warna,
            'plat' => $request->plat,
            // 'plat' => Str::random($request->name),
            'filename' => $new_name,
        ]);
        Alert::success('Berhasil Menambahkan', 'Data Mobil');
        return redirect()->route('mobil.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $mobil = Mobil::find($id);
        $merks = Merk::all(); 
        return view('admin.mobil.edit', compact('mobil', 'merks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $mobil = Mobil::find($id);
        $merks = Merk::all(); 
        $image = $request->hidden_image;
        $image = $request->file('filename');
            if ($image != '') {
                $request -> validate([
                    'name' => 'required',
                    'merk_id' => 'required',
                    'warna' => 'required',
                    'plat' => 'required',
                    'filename' => 'image|max:2048', 
                ]);
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('asset/images/mobil'), $new_name);
            } else {
                $request->validate([
                    'name' => 'required',
                    'merk_id' => 'required',
                    'warna' => 'required',
                    'plat' => 'required',
                ]);
            }

            $form_data = array(
                'name' => $request->name,
                'merk_id' => $request->merk_id,
                'warna' => $request->warna,
                'plat' => $request->plat,
                'filename' => $new_name, 
            );

            $mobil->update($request->all());
            return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mobil = Mobil::find($id);
        $mobil->delete();
        return redirect()->back();
    }
    
}
