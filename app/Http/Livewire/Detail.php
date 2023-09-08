<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Redirect;
use Str;

class Detail extends Component
{
    public $slug;   
    public $show = false;
    public $Alamat;
    public $Ucapan;
    public $waktu;
    protected $listeners = [
        'showEdit' => 'showEdit'
    ];

    public function mount($slug)
    {
        $this->slug = $slug;               
    }
   
    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function close()
    {
        //$thisUrl = url()->current();
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->get()->first();
        if(!$product){
            return abort(404);
        }
        return view('livewire.detail', compact('product'))->layout('layouts.main', ['title' => $product['slug']]);
    }

    public function convertdaytoid($day){
        switch($day){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
            case 'Mon':			
                $hari_ini = "Senin";
            break;
            case 'Tue':
                $hari_ini = "Selasa";
            break;
            case 'Wed':
                $hari_ini = "Rabu";
            break;
            case 'Thu':
                $hari_ini = "Kamis";
            break;
            case 'Fri':
                $hari_ini = "Jumat";
            break;
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
        return $hari_ini;
    }

    public function pesan()
    {
        //$mytime = Carbon\Carbon::now();
        //$this->validate();

        /*$data = [
            'name' => $this->slug,
            'ucapan' => $this->Ucapan,
            'alamat' => $this->Alamat,
            'waktu' => $this->waktu,
        ];*/

        $error = 0;
        if (Str::length($this->Ucapan)<=3){
            $error = $error + 1;
        }

        if (Str::length($this->Alamat)<12){
            $error = $error + 2;
        }

        if($error){
            if($error-2>=0){
                $error= $error-2;
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "Alamat setidaknya 12 karakter",
                ]);
            }
            if($error-1>=0){
                $error= $error-1;
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "Ucapan setidaknya 3 karakter",
                ]);
            }
            return;
        }

        $waktupesan = strtotime($this->waktu);
        $waktusekarang = strtotime(Carbon::today());
        if ($waktupesan <= $waktusekarang){
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Waktu pemesanan tidak dapat di hari yang sama atau sebelumnya',
            ]);
            //Session::flash('alert-class', 'alert-success');
            return;
        }

        //$this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Successfully Update <strong>'$this->name'</strong>"]);

        //$this->emit('refreshProduct');
        $nama_t = urlencode($this->slug);
        //$ucapan_t = urlencode($this->Ucapan);
        //$ucapan_t = str_replace('+', '%20', $ucapan_t);
        //$alamat_t = urlencode($this->Alamat);
        //$alamat_t = str_replace('+', '%20', $alamat_t);
        $day = date('D', $waktupesan);
        $day = $this->convertdaytoid($day);
        $waktu_t = urlencode($this->waktu);

        $pesanan = "Jenis bunga: {$nama_t}\nUcapan: {$this->Ucapan}\nAlamat: {$this->Alamat}\nWaktu Pengiriman: {$day}, {$waktu_t}";
        $pesanan_t = urlencode($pesanan);

        //dd($pesanan_t);
        //$this->close();
        //6281283616186
        $url = "https://api.whatsapp.com/send/?phone=6281283616186&text=".$pesanan_t."&type=phone_number";
        return redirect()->away($url);
    }
}