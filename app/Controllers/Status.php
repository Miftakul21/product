<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\StatusModel;


class Status extends BaseController
{
    use ResponseTrait;
    
    function __construct()
    {
        $this->model = new StatusModel();
    }

    public function index()
    {
        $data = $this->model->orderBy('id_status', 'ASC')->findAll();

        $data_status = [];
        $index = 0;

        foreach ($data as $status) {
            $data_status[$index]['status_id'] = $status['id_status'];
            $data_status[$index]['status'] = $status['nama_status'];
            $index += 1;
        }

        if($data) {
            return $this->respond(['success' => true,'message' => 'Data found!','data' => $data_status]);
        }

        return $this->respond(['success' => false,'message' => 'Data not found!'])->setStatusCode(404);;
    }

    public function create()
    {
        $rules = ['nama_status' => ['rules' => 'required'],];

        if(! $this->validate($rules)) {
            return $this->respond([
                'success' => false, 
                'message' => 'Input request not valid', 
                "error" => $this->validator->getErrors() 
            ]);
        }

        $data = ['nama_status' => $this->request->getVar('nama_status')];
        $data = $this->model->save($data);

        if($data) {
            return $this->respond([ 'success' => true, 'message' => 'Berhasil create data']);
        }

        return $this->respond([ 'success' => false, 'message' => 'Gagal create data'])->setStatusCode(400);
    }
    
    public function show($id = null) 
    {
        $data = $this->model->where('id_status', $id)->findAll();

        $data_status = [];
        $index = 0;

        foreach ($data as $status) {
            $data_status[$index]['status_id'] = $status['id_status'];
            $data_status[$index]['status'] = $status['nama_status'];
            $index += 1;
        }

        if($data) {
            return $this->respond(['success' => true, 'message' => 'Data found', 'data' => $data_status]);
        }

        return $this->respond(['success' => false, 'message' => 'Data not found'])->setStatusCode(404);
    }

    public function update($id = null) 
    {
        $status = $this->model->where('id_status', $id)->findAll();

        if(!$status) {
            return $this->respond([
                'success' => false, 
                'message' => 'Data not found!' 
            ]);
        }

        $data = $this->request->getRawInput();
        
        $rules = ['nama_status' => 'required'];
        if(! $this->validate($rules)) {
            return $this->respond([
                'success' => false, 
                'message' => 'Input request not valid', 
                "error" => $this->validator->getErrors()
            ]);
        }

        $request_data = [
            'nama_status' => $data['nama_status']
        ];

        $update_data = $this->model->update($id, $request_data);
        if($update_data) {
            return $this->respond(['success' => true, 'message' => 'Berhasil update data']);
        }
        
        return $this->respond(['success' => false, 'message' => 'Gagal update data'])->setStatusCode(400);;
    }

    public function delete($id)
    {
        $status = $this->model->where('id_status', $id)->findAll();

        if(!$status) {
            return $this->respond(['success' => false, 'message' => 'Data not found!']);
        }

        $delete_data = $this->model->where('id_status', $id)->delete();

        if($delete_data) {
            return $this->respond(['success' => true, 'message' => 'Berhasil delete data']);
        }

        return $this->respond(['success' => false, 'message' => 'Gagal delete data'])->setStatusCode(400);
    }

}