<?php

namespace App\Controllers;

use App\Models\DiskonModel;
use CodeIgniter\Controller;

class DiskonController extends BaseController
{
     protected $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new DiskonModel();
    }

   public function index()
{
    $diskonModel = new \App\Models\DiskonModel();
    $perPage = $this->request->getGet('perPage') ?? 10;
    $keyword = $this->request->getGet('keyword');

    if ($keyword) {
        $diskonModel->groupStart()
                    ->like('tanggal', $keyword)
                    ->orLike('nominal', $keyword)
                    ->groupEnd();
    }

    $data['diskon'] = $diskonModel->paginate($perPage);
    $data['pager'] = $diskonModel->pager;

    return view('diskon/index', $data);
}



    public function create()
    {
        return view('diskon/create');
    }

   public function save()
{
    $tanggal = $this->request->getPost('tanggal');
    $nominal = $this->request->getPost('nominal');

    $existing = $this->diskonModel->where('tanggal', $tanggal)->first();
    if ($existing) {
        return redirect()->to('/diskon')->with('error', 'Diskon untuk tanggal ini sudah ada.');
    }

    $this->diskonModel->save([
        'tanggal' => $tanggal,
        'nominal' => $nominal
    ]);

    return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan!');
}


    public function edit($id)
    {
        $data['diskon'] = $this->diskonModel->find($id);
        return view('diskon/edit', $data);
    }

    public function update($id)
    {
        $this->diskonModel->update($id, [
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect()->to('/diskon');
    }

    public function delete($id)
    {
        $this->diskonModel->delete($id);
        return redirect()->to('/diskon');
    }
    public function form($id = null)
{
    $diskon = $id ? $this->diskonModel->find($id) : null;
    return view('diskon/form_modal', ['diskon' => $diskon]);
}

}
