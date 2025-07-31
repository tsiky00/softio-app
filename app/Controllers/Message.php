<?php

namespace App\Controllers;

use App\Models\Message_model;

class Message extends BaseController 
{
    public function save () {
        helper(['form']);

        $rules = [
            'nom'       => 'required|min_length[3]|max_length[20]',
            'email'    => 'required|min_length[3]|valid_email',
            'message'     => 'required'
        ];

        if (!$this->validate($rules)) {
            // Retour JSON des erreurs
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $model = new Message_model();
        $data = [
            'nom'       => $this->request->getPost('nom'),
            'email'     => $this->request->getPost('email'),
            'message'    => $this->request->getPost('message')
        ];

        $model->save($data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Message envoyé !',
        ]);
    }
}