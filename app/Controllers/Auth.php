<?php 
namespace App\Controllers;
use App\Models\RecordsModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function storeRegister()
    {
        $name  = $this->request->getPost('name');
        $nim   = $this->request->getPost('nim');
        $email = $this->request->getPost('email');

        $studentModel = new \App\Models\StudentModel();

        // Check if student already exists
        if ($studentModel->where('nim', $nim)->orWhere('email', $email)->first()) {
            return redirect()->to('/register')->with('error', 'NIM or Email already registered!');
        }

        // Use NIM as password For Students
        $studentModel->insert([
            'name'          => $name,
            'nim'           => $nim,
            'email'         => $email,
            'password_hash' => password_hash($nim, PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login')->with('success', 'Account created! You can now log in.');
    }


    public function checkLogin()
    {
        $username = strtolower($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        $model = new RecordsModel();

        // Admin login rule
        if (strpos($username, 'admin') !== false && $password === 'password246') {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $username,
                'role'       => 'admin'
            ]);
            return redirect()->to('/home');   // send admin to courses
        }

        // ✅ Student login rule
        $studentModel = new \App\Models\StudentModel();
        $user = $studentModel->where('nim', $username)
                            ->orWhere('email', $username)
                            ->orWhere('name', $username)
                            ->first();

        if ($user && password_verify($password, $user['password_hash'])) {
            session()->set([
                'isLoggedIn' => true,
                'user_id'    => $user['id'],
                'username'   => $user['name'],
                'role'       => 'student'
            ]);
            return redirect()->to('/home');
        }

        return redirect()->to('/login')->with('error', 'Username atau Password salah!');
    }

    public function logout()
    {
        session()->destroy();

        helper('cookie');
        delete_cookie('ci_session'); 

        return redirect()->to('/login');
    }
}
