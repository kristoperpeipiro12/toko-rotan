<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Penerima;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $penerima = Penerima::where('id_customer', $userId)->get();
        return view('shop.account.pages.account', compact('penerima'));
    }



    public function updateTanggalLahir(Request $request)
    {

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
    public function TambahAlamat(Request $request)
{
    try {

        $validatedData = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'nohp_penerima' => 'required|regex:/^[0-9]+$/|max:20',
            'alamat' => 'required|string|max:500',
            'lokasi' => 'nullable|string|max:255',
        ]);


        $id_customer = Auth::id();


        Penerima::create([
            'id_penerima' => Str::uuid()->toString(),
            'id_customer' => $id_customer,
            'nama_penerima' => $validatedData['nama_penerima'],
            'nohp_penerima' => $validatedData['nohp_penerima'],
            'alamat' => $validatedData['alamat'],
            'lokasi' => $validatedData['lokasi'] ?? null,
        ]);

        return redirect()->route('cs.account')->with('toast_success', 'Alamat berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->route('cs.account')->with('toast_error', 'Terjadi kesalahan, coba lagi.');
    }
}

    public function UpdateAlamat(Request $request)
    {
        $id_customer = Auth::id();
        $penerima = Penerima::where('id_customer', $id_customer)->get()?? collect([]);

        if ($request->isMethod('get')) {
            // dd($penerima);
            return view('shop.account.pop-up.pop-up-account', compact('penerima'));
        }
        try {
            $validatedData = $request->validate([
                'nama_penerima' => 'required|string|max:255',
                'nohp_penerima' => 'required|string|max:15',
                'alamat' => 'required|string|max:500',
                'lokasi' => 'nullable|string|max:255',
            ]);

            if (!$penerima) {
                $penerima = new Penerima();
                $penerima->id_penerima = uniqid('PNR-');
                $penerima->id_customer = $id_customer;
            }

            $penerima->fill($validatedData);
            $penerima->save();

            return redirect()->route('cs.account')->with('toast_success', 'Alamat berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('cs.account')->with('toast_error', 'Terjadi kesalahan, coba lagi.');
        }

    }



}
