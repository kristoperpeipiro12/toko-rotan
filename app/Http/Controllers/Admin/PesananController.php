<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Mail\StatusPesanan;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PesananController extends Controller
{
    public function index()
    {
        $pageTitle = "Pesanan";
        $checkout = Checkout::all();
        return view('admin.pesanan.index', compact('pageTitle', 'checkout'));
    }

    public function kirimEmail($email, $subject, $message)
    {
        try {
            Mail::to($email)->send(new StatusPesanan($subject, $message));
        } catch (\Exception $e) {
            throw new \Exception("Email gagal dikirim: " . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, $id_checkout)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:diproses,dikirim,diterima,batal'
        ]);

        $checkout = Checkout::findOrFail($id_checkout);

        // Update status pesanan
        $checkout->status = $request->status;
        $checkout->save();
        $customerEmail = $checkout->customer->email;
        $subject = "Pembaruan Status Pesanan #{$checkout->id_checkout}";
        $statusMessage = "";
        switch ($checkout->status) {
            case 'diproses':
                $statusMessage = "Pesanan Anda sedang diproses.";
                break;
            case 'dikirim':
                $statusMessage = "Pesanan Anda sedang dalam perjalanan.";
                break;
            case 'diterima':
                $statusMessage = "Pesanan telah kami terima.";
                break;
            case 'batal':
                $statusMessage = "Pesanan Anda telah dibatalkan.";
                break;
            default:
                $statusMessage = "Status pesanan tidak dikenali.";
                break;
        }
        // HTML Email Template
        $message = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Status Pesanan Anda</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 20px;
                    background-color: #f5f5f5;
                }
                .container {
                    background: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    max-width: 600px;
                    margin: auto;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .header {
                    text-align: center;
                    font-size: 24px;
                    font-weight: bold;
                    color:rgb(34, 56, 255);
                    margin-bottom: 20px;
                }
                .order-details {
                    border-top: 2px solid #e0e0e0;
                    padding-top: 15px;
                    margin-top: 15px;
                }
                .order-info {
                    font-size: 14px;
                    color: #555;
                }
                .order-info strong {
                    color: #000;
                }
                .button {
                    text-align: center;
                    margin-top: 20px;
                }

                .footer {
                    text-align: center;
                    font-size: 12px;
                    color: #777;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>TOKO ROTAN AL-ZAHRA</div>

                <p>Hai {$checkout->customer->name},</p>
                <p
                    <strong>{$statusMessage}</strong>.
                </p>

                <div class='order-details'>
                    <p><strong>Rincian Pesanan:</strong></p>
                    <p class='order-info'>
                        <strong>No. Pesanan:</strong> #{$checkout->id_checkout} <br>
                        <strong>Tanggal Pesanan:</strong> " . $checkout->created_at->format('d/m/Y H:i') . "<br>
                    </p>

                    <p><strong>Produk:</strong> {$checkout->produk_varian->produk->nama_produk}</p>
                    <p><strong>Variasi:</strong> {$checkout->produk_varian->warna} |
                       {$checkout->produk_varian->ukuran}</p>
                    <p><strong>Jumlah:</strong> {$checkout->jumlah} pcs</p>
                    <p><strong>Harga:</strong> Rp
                        " . number_format($checkout->jumlah * $checkout->produk_varian->harga, 0, ',', '.') . " ,00
                    </p>
                </div>


                <p>Terima kasih telah berbelanja di toko kami.</p>

                <div class='footer'>
                    <p>Tim TOKO ROTAN AL-ZAHRA</p>
                    <p>Butuh bantuan? Hubungi kami <a href='#'>di sini</a></p>
                </div>
            </div>
        </body>
        </html>
        ";

        // Coba kirim email
        try {
            $this->kirimEmail($customerEmail, $subject, $message);
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', 'Status berhasil diperbarui, namun email gagal dikirim: ' . $e->getMessage());
        }

        return redirect()->back()->with('toast_success', 'Status pesanan berhasil diperbarui dan email dikirim.');
    }
    public function delete($id)
    {
        $produk = Checkout::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.pesanan.index')->with('toast_success', 'Pesanan berhasil dihapus.');
    }

}
