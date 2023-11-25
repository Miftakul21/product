<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    use ResponseTrait;
    
    function __construct()
    {
        $this->model = new KategoriModel();
    }

    public function index()
    {
        $data = $this->model->orderBy('id_kategori', 'ASC')->findAll();

        $data_kategori = [];
        $index = 0;

        foreach ($data as $kategori) {
            $data_kategori[$index]['kategori_id'] = $kategori['id_kategori'];
            $data_kategori[$index]['kategori'] = $kategori['nama_kategori'];
            $index += 1;
        }

        if($data) {
            return $this->respond([
                'success' => true, 
                'message' => 'Data found!', 
                'data' => $data_kategori 
                ]);
        }

        return $this->respond(['success' => false,'message' => 'Data not found!'])->setStatusCode(404);
    }

    public function create()
    {
        $rules = ['nama_kategori' => ['rules' => 'required'],];

        if(! $this->validate($rules)) {
            return $this->respond([
                'success' => false, 
                'message' => 'Input request not valid', 
                "error" => $this->validator->getErrors() 
            ])->setStatusCode(400);
        }

        $data = ['nama_kategori' => $this->request->getVar('nama_kategori')];
        $data = $this->model->save($data);

        if($data) {
            return $this->respond(['success' => true, 'message' => 'Berhasil create data']);
        }

        return $this->respond([ 'success' => false, 'message' => 'Gagal create data'])->setStatusCode(400);
    }
    
    public function show($id = null) 
    {
        $data = $this->model->where('id_kategori', $id)->findAll();

        $data_kategori = [];
        $index = 0;

        foreach ($data as $kategori) {
            $data_kategori[$index]['kategori_id'] = $kategori['id_kategori'];
            $data_kategori[$index]['kategori'] = $kategori['nama_kategori'];
            $index += 1;
        }

        if($data) {
            return $this->respond([ 
                'success' => true, 
                'message' => 'Data found', 
                'data' => $data_kategori 
            ]);
        }

        return $this->respond(['success' => false, 'message' => 'Data not found'])->setStatusCode(404);
    }

    public function update($id = null) 
    {
        $kategori = $this->model->where('id_kategori', $id)->findAll();

        if(!$kategori) {
            return $this->respond(['success' => false, 'message' => 'Data not found!'])->setStatusCode(404);
        }

        $data = $this->request->getRawInput();
        
        $rules = ['nama_kategori' => 'required'];
        if(! $this->validate($rules)) {
            return $this->respond([
                'success' => false, 
                'message' => 'Input request not valid', 
                "error" => $this->validator->getErrors() 
                ])->setStatusCode(404);
        }

        $request_data = [
            'nama_kategori' => $data['nama_kategori']
        ];

        $update_data = $this->model->update($id, $request_data);
        if($update_data) {
            return $this->respond(['success' => true, 'message' => 'Berhasil update data']);
        }
        
        return $this->respond(['success' => false, 'message' => 'Gagal update data'])->setStatusCode(400);
    }

    public function delete($id)
    {
        $kategori = $this->model->where('id_kategori', $id)->findAll();

        if(!$kategori) {
            return $this->respond(['success' => false, 'message' => 'Data not found!'])->setStatusCode(404);
        }

        $delete_data = $this->model->where('id_kategori', $id)->delete();

        if($delete_data) {
            return $this->respond(['success' => true, 'message' => 'Berhasil delete data']);
        }

        return $this->respond(['success' => false, 'message' => 'Gagal delete data'])->setStatusCode(400);
    }

}