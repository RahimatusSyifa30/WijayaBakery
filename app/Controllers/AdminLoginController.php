<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminLoginController extends BaseController
{
    public function index()
    {
         // Jika sudah login, redirect ke halaman admin
         if (session()->get('isLoggedIn')) {
            return redirect('admin');
        }

        $data = [];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];

            $errors = [
                'password' => [
                    'required' => 'Password wajib diisi'
                ],
                'username' => [
                    'required' => 'Username wajib diisi'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AdminModel();
                $admin = $model->getAdminByUsername($this->request->getPost('username'));
                if($admin['password']==$this->request->getPost('password')){
                    session()->set('isLoggedIn', true);
                    session()->set('adminId', $admin['id_admin']);
                    session()->set('adminUsername', $admin['username']);

                    return redirect('admin');
                } else {
                    $data['error'] = 'Username atau password salah';
                }
            }
        }

        echo view('admin/admin_login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect('admin/login');
    }
}
 