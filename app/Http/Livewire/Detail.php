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
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "Alamat setidaknya 12 karakter",
                ]);
            }
            if($error-1>=0){
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "Ucapan setidaknya 3 karakter",
                ]);
            }
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
        $ucapan_t = urlencode($this->Ucapan);
        $alamat_t = urlencode($this->Alamat);
        $waktu_t = urlencode($this->waktu);

        $pesanan = "Jenis bunga: {$nama_t}\nUcapan: {$ucapan_t}\nAlamat: {$alamat_t}\nWaktu Pengiriman: {$waktu_t}";
        $pesanan_t = urlencode($pesanan);

        //dd($pesanan_t);
        //$this->close();
        //6281283616186
        $url = "https://api.whatsapp.com/send/?phone=6281283616186&text=".$pesanan_t."&type=phone_number";
        return redirect()->away($url);
    }
}