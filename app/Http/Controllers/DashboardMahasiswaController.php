<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mahasiswa.index', [
            'title' => 'Dashboard Mahasiswa',
            'mahasiswa' => Mahasiswa::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mhslast = Mahasiswa::orderBy('id', 'DESC')->first();
        $nimlast = $mhslast->nim;
        $nimnew = $nimlast + 1;
       

        return view('dashboard.mahasiswa.create', [
            'title' => 'Dashboard Mahasiswa',
            'data' => $nimnew,
            'jurusan' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        
        // Validasi Data Yang Dikirim User
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required|string|max:100',
            'kelas'=> 'required',
            'status' => 'required',
            'category_id' => 'required|int',
            'gambar' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
 
        // buat nama file gambar baru
        $newImageName = time() . '-' . rand(100,999). '-' . $request->nama  . '.' . $request->gambar->extension();
        
        // pindahkan file gambar ke folder images di public
        $request->gambar->move(public_path('images'), $newImageName);

        // simpan nama gambar baru ke variable validate
        $validatedData['img'] = $newImageName ;

        // ambil id user
        $validatedData['user_id'] = auth()->user()->id;

        // simpan ke database
        Mahasiswa::create($validatedData);

        // redirect ke halaman index
        return redirect('/dashboard/mahasiswa')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.show', [
            'title' => 'Dashboard Mahasiswa',
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.edit', [
            'title' => 'Dashboard Mahasiswa | EDIT',
            'mahasiswa' => $mahasiswa,
            'jurusan' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
       
        // Membuat Rules Validasi
        $rules = ([
            'nim' => 'required',
            'nama' => 'required|string|max:100',
            'kelas'=> 'required',
            'status' => 'required',
            'category_id' => 'required|int'
        ]);

        // perbarui rules bila user mengupload gambar
        if ($request->hasFile('gambar')) {
            $rules['gambar'] = 'required|mimes:jpg,png,jpeg|max:5048';
        }

        $validatedData = $request->validate($rules);

        // ika User gambar upload gambar baru
        if ($request->hasFile('gambar')) {
    
            // Hapus Data Gambar Lama
            if ($request->oldImage) {
                File::delete(public_path('images/' . $request->oldImage));
            }
            
            // buat nama file gambar baru
            $newImageName = time() . '-' . rand(100,999). '-' . $request->nama  . '.' . $request->gambar->extension();
        
            // pindahkan file gambar ke folder images di public
            $request->gambar->move(public_path('images'), $newImageName);

            // simpan nama gambar baru ke variable validate
            $validatedData['img'] = $newImageName ;

        }

        // get user id
        $validatedData['user_id'] = auth()->user()->id;

        // isi updated at
        $validatedData['updated_at'] = now();
        unset($validatedData['gambar']);
        // update data
        Mahasiswa::where('id', $mahasiswa->id)
                ->update($validatedData);

        // redirect ke halaman index
        return redirect('/dashboard/mahasiswa')->with('success', 'Data Mahasiswa updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        
        // Hapus Gambar dalam file images
        if ($mahasiswa->img) {
            File::delete(public_path('images/' . $mahasiswa->img));
        }
         // Hapus Data Dalam Database
         Mahasiswa::destroy($mahasiswa->id);

         // redirect ke halaman index
         return redirect('/dashboard/mahasiswa')->with('success', 'Post Deleted successfully');
    }
}
