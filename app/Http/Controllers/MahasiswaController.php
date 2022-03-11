<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    public function index(){

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->jurusan;
        } 
        
        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->name;
        } 

        return view('mahasiswa',[
            "title" => "Data Mahasiswa",
            "dataMhs" => Mahasiswa::latest()->filter(request(['search', 'category','user']))->paginate(5)->withQueryString()
        ]);
    }

    public function show(Mahasiswa $mahasiswa){
        return view('detailmhs',[
            "title" => "Detail Mahasiswa",
            "dataMhs" => $mahasiswa         
        ]);
    }

    public function categories(){
        return view('categories', [
            "title" => "Jurusan",
            "categories" => Category::all()
        ]);
    }

    public function category(Category $category){
        return view('category',[
            'title' => 'Jurusan',
            'mahasiswas' => $category->mahasiswas,
            'category' => $category
        ]);
    }

    public function mahasiswa(User $user){
        return view('mahasiswa',[
            'title' => 'Data Mahasiswa',
            'inputer' => $user->name,
            'dataMhs' => $user->mahasiswas->load('user')
        ]);   
    }

}
