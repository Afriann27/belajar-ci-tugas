<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

class KeranjangController extends BaseController
{
    protected $cart;

    public function __construct()
    {
        $this->cart = Services::cart();
    }

    public function index()
    {
        $data = [
            'items' => $this->cart->contents(),
            'total' => $this->cart->total()
            
        ];

        return view('v_keranjang', $data);
    }

    public function add()
    {
        // Ambil diskon dari session
$diskon = session()->get('diskon') ?? 0;
$harga = $this->request->getPost('harga');
$hargaDiskon = max(0, $harga - $diskon); // harga potong diskon


// Masukkan ke keranjang dengan harga diskon
$this->cart->insert([
    'id'      => $this->request->getPost('id'),
    'name'    => $this->request->getPost('nama'),
    'price'   => $hargaDiskon, // ✅ harga sudah dipotong
    
    'qty'     => 1,
    'options' => ['foto' => $this->request->getPost('foto')]
    
]);


        return redirect()->to('/keranjang')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    public function edit()
    {
        $request = service('request');
        $items = $this->cart->contents();
        $i = 1;

        foreach ($items as $item) {
            $qty = $request->getPost('qty' . $i++);
            $this->cart->update([
                'rowid' => $item['rowid'],
                'qty'   => $qty
            ]);
        }

        return redirect()->to('/keranjang')->with('success', 'Keranjang diperbarui.');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        return redirect()->to('/keranjang')->with('success', 'Item dihapus dari keranjang.');
    }

    public function clear()
    {
        $this->cart->destroy();
        return redirect()->to('/keranjang')->with('success', 'Keranjang dikosongkan.');
    }
}
