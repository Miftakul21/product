<?php 

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\StatusModel;

class Produk extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->model = new ProdukModel();
        $this->modelStatus = new StatusModel();
        $this->modelKategori = new KategoriModel();
    }
    
    public function index()
    {
        $data = $this->model->getProdukStatus();

        $data_product = [];
        $index = 0;

        foreach ($data as $produk) {
            $data_product[$index]['produk_id'] = $produk->id_produk;
            $data_product[$index]['produk'] = $produk->nama_produk;
            $data_product[$index]['produk_harga'] = $produk->harga;
            $data_product[$index]['produk_kategori'] = $produk->nama_kategori;
            $data_product[$index]['produk_status'] = $produk->nama_status;
            $index += 1;
        }

        if($data) {
            return $this->respond(['success' => true,'message' => 'Data found!','data' => $data_product]);
        }

        return $this->respond([ 
            'success' => false, 
            'message' => 'Data not found!', 
            'data' => $data
        ])->setStatusCode(404);
    }

    public function getProduk($id_status) 
    {
        $data = $this->model->getProdukStatus($id_status);

        $data_product = [];
        $index = 0;

        foreach ($data as $produk) {
            $data_product[$index]['produk_id'] = $produk->id_produk;
            $data_product[$index]['produk'] = $produk->nama_produk;
            $data_product[$index]['produk_harga'] = $produk->harga;
            $data_product[$index]['produk_kategori'] = $produk->nama_kategori;
            $data_product[$index]['produk_status'] = $produk->nama_status;
            $index += 1;
        }

        if($data) {
            return $this->respond(['success' => true,'message' => 'Data found!','data' => $data_product]);
        }

        return $this->respond([ 
            'success' => false, 
            'message' => 'Data not found!', 
            'data' => $data
        ])->setStatusCode(404);

    }

    public function create()
    {
        $rules = [
            'nama_produk' => ['rules' => 'required'],
            'harga' => ['rules' => 'required'],
            'kategori_id' => ['rules' => 'required'],
            'status_id' => ['rules' => 'required'],
        ];

        if(! $this->validate($rules)) {
            return $this->respond([
                'success' => false, 
                'message' => 'Input request not valid', 
                "error" => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'kategori_id' => $this->request->getVar('kategori_id'),
            'status_id' => $this->request->getVar('status_id'),
        ];

        $data = $this->model->save($data);

        if($data) {
            return $this->respond(['success' => true, 'message' => 'Berhasil create data']);
        }
        return $this->respond(['success' => false, 'message' => 'Gagal create data'])->setStatusCode(400);;
    }
    
    public function show($id)
    {
        $data = $this->model->getProduk($id);
        $data_product = [];
        $index = 0;

        foreach ($data as $produk) {
            $data_product[$index]['produk_id'] = $produk->id_produk;
            $data_product[$index]['produk'] = $produk->nama_produk;
            $data_product[$index]['produk_harga'] = $produk->harga;
            $data_product[$index]['produk_kategori_id'] = $produk->kategori_id;
            $data_product[$index]['produk_status_id'] = $produk->status_id;
            $index += 1;
        }

        $data_product[$index]['status'] = $this->modelStatus->findAll();
        $data_product[$index]['kategori'] = $this->modelKategori->findAll();
        
        if($data) {
            return $this->respond(['success' => true, 'message' => 'Data found', 'data' => $data_product]);
        }

        return $this->respond(['success' => false, 'message' => 'Data not found'])->setStatusCode(404);;
    }


    public function update($id) 
    {
        $product = $this->model->where('id_produk', $id)->findAll();

        if(!$product) {
            return $this->respond(['success' => false, 'message' => 'Data not found!'])->setStatusCode(404);
        }

        $data = $this->request->getRawInput();

        $rules = [
            'nama_produk' => ['rules' => 'required'],
            'harga' => ['rules' => 'required'],
            'kategori_id' => ['rules' => 'required'],
            'status_id' => ['rules' => 'required'],
        ];

        if(! $this->validate($rules)) {
            return $this->respond([
                'success' => false, 
                'message' => 'Input request not valid', 
                "error" => $this->validator->getErrors()
            ])->setStatusCode(400);
        }

        $request_data = [
            'nama_produk' => $data['nama_produk'],
            'harga' => $data['harga'],
            'kategori_id' => $data['kategori_id'],   
            'status_id' => $data['status_id'],   
        ];

        $update_data = $this->model->update($id, $request_data);

        if($update_data) {
            return $this->respond(['success' => true, 'message' => 'Berhasil update data']);
        }
        
        return $this->respond(['success' => false, 'message' => 'Gagal update data'])->setStatusCode(400);;
    }

    public function delete($id)
    {
        $produk = $this->model->where('id_produk', $id)->findAll();

        if(!$produk) {
            return $this->respond(['success' => false, 'message' => 'Data not found!'])->setStatusCode(404);;
        }

        $delete_data = $this->model->where('id_produk', $id)->delete();

        if($delete_data) {
            return $this->respond(['success' => true, 'message' => 'Berhasil delete data']);
        }

        return $this->respond(['success' => false, 'message' => 'Gagal delete data'])->setStatusCode(400);;
    }
}