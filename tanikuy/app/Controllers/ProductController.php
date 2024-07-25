<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $products;
    protected $validation;

    function __construct()
    {
        $this->products = new ProductModel();
    }

    public function index()
    {
        $hlm = "Home";
        $segment = $this->request->uri->getSegment(2);

        if (!empty($segment)) {
            $hlm = ucwords($segment);
        }

        // Data lain yang ingin dikirimkan ke view
        $data = [
            'hlm' => $hlm,
            'products' => $this->products->findAll(),
            'otherData' => 'some other data'
        ];

        return view('seller/produk', $data);
    }

    public function create()
    {

        $dataImage = $this->request->getFile('image');

        // Asumsikan bahwa seller_id disimpan dalam sesi setelah login
        $seller_id = session()->get('seller_id');

        if ($seller_id === null) {
            return redirect()->back()->with('failed', 'Anda harus login sebagai penjual untuk menambahkan produk');
        }

        $dataForm = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'seller_id' => $seller_id, // Menambahkan seller_id ke datal
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($dataImage->isValid()) {
            $fileName = $dataImage->getRandomName();
            $dataForm['image'] = $fileName;
            $dataImage->move('img/', $fileName); // Memindahkan file ke folder img
        }

        $this->products->insert($dataForm);

        return redirect('seller/produk')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $dataProduk = $this->products->find($id);

        $dataForm = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->request->getPost('check') == 1) {
            if ($dataProduk['image'] != '' and file_exists("img/" . $dataProduk['image'] . "")) {
                unlink("img/" . $dataProduk['image']);
            }

            $dataFoto = $this->request->getFile('image');

            if ($dataFoto->isValid()) {
                $fileName = $dataImage->getRandomName();
                $dataForm['image'] = $fileName;
                $dataImage->move('img/', $fileName);
            }
        }

        $this->products->update($id, $dataForm);

        return redirect('seller/produk')->with('success', 'Data Berhasil DiRubah');
    }

    public function delete($id)
    {
        $dataProduk = $this->products->find($id);

        if ($dataProduk['image'] != '' and file_exists("img/" . $dataProduk['image'] . "")) {
            unlink("img/" . $dataProduk['image']);
        }

        $this->products->delete($id);

        return redirect('seller/produk')->with('success', 'Data Berhasil Dihapus');
    }
}
