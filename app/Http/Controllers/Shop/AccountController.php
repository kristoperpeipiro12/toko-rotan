<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AccountController extends Controller
{
    public function index(){
            $user= auth()->user();
            return view('shop.account.pages.account',compact('user'));
    }


    public function updateTanggalLahir(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'tanggal' => 'required|numeric|min:1|max:31',
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:1900|max:' . date('Y'),
        ]);

        $tanggalLahir = Carbon::createFromFormat('d/m/Y', "{$request->tanggal}/{$request->bulan}/{$request->tahun}")->format('Y-m-d');

        $customer = auth()->user();

        $customer->tanggal_lahir = $tanggalLahir;
        $customer->save();

        return redirect()->route('cs.account')->with('toast_success', 'Tanggal lahir berhasil diperbarui!');
    }

    public function updateJenisKelamin(Request $request)
    {
        $request->validate([
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan,Lainnya',
        ], [
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin tidak valid.',
        ]);

        $customer = auth()->user();
        $customer->jenis_kelamin = $request->jenis_kelamin;
        $customer->save();

        return redirect()->route('cs.account')->with('toast_success', 'Jenis Kelamin berhasil diperbarui!');
    }

    public function UpdateAlamat(){

        $customer = auth()->user();
        
        return redirect()->route('cs.account')->with('toast_success', 'Alamat berhasil diubah');

    }


}
