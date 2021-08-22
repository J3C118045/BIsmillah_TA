<?php

namespace App\Controllers;
use App\Models\Auth_m;
use App\Models\User_m;
use App\Models\Divisi_m;
use App\Models\Reset_model_m;
use CodeIgniter\HTTP\IncomingRequest;
/** 
* @property IncomingRequest $request
*/

class Auth extends BaseController
{
	public function __construct()
	{
		helper('form');
        helper('text');
		$this->divisi = new Divisi_m();
        $this->auth = new Auth_m();
        $this->user = new User_m();
        $this->reset_pass = new Reset_model_m();
	}
	public function index()
	{
		$data = array(
			'title'		  => 'Login',
		);
		return view('auth/login', $data);
	}

	public function login()
	{
        if ($this->validate([
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ]
        ])) {
            //jika valid
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            // $password = password_hash($password, PASSWORD_DEFAULT);
            $cek = $this->auth->login($username);
            // die(var_dump(password_hash($password, PASSWORD_DEFAULT)));
            // die(var_dump(password_verify($password,$cek['password'])));
            if ($cek != null && password_verify($password,$cek['password'])) {
                //jika data cocok
                session()->set('log', true);
                session()->set('id_user', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                session()->set('id_divisi', $cek['id_divisi']);
                session()->set('foto', $cek['foto']);
                session()->setFlashdata('pesan', 'Login berhasil, selamat datang ');
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('pesan', 'Login Anda gagal !! Username atau password salah !!');
                return redirect()->to(base_url('auth'));
            }
        }
        else {
            //jika tidak valid
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
	}

    public function forgot()
    {
        $data = array(
			'title'		  => 'Lupa Kata Sandi Anda ?',
		);
		return view('auth/forgot_pass', $data);
    }

    public function proses_forgot()
    {
        $useremail = $this->request->getVar('useremail');
        $cek = $this->auth->login($useremail);
        if ($cek == null) {
            $cek = $this->auth->cek_email($useremail);
        }
        if ($cek == null) {
            session()->setFlashdata('pesan', 'Username atau Email tidak terdaftar...');
            return redirect()->to(base_url('auth/forgot'));
        } else {
            $token = random_string('alnum',50);
            $data = array (
                'id_user'		=>$cek['id_user'],
                'token'			=> $token,
            );
            $this->reset_pass->Create_Token($data);
            // die(var_dump($cek));

            $message = "<p>Anda melakukan permintaan atur ulang password</p>";
            $message .= "<a href='".base_url('auth/reset_pass/'.$token)."'>klik untuk atur ulang password</a>";

            $email = \Config\Services::email();

            $email->setFrom('ejfp.internal2021@gmail.com');
            $email->setTo($cek['email']);
            $email->setSubject("Atur Ulang Password");
            $email->setMessage($message);
            
            $email->send();
            if($email->send())
            {
                session()->setFlashdata('sukses', "Silahkan cek email anda");
                return redirect()->to(base_url('auth'));
            }
            else {
                session()->setFlashdata('pesan', 'Gagal atur ulang password, masukan email yang benar');
                return redirect()->to(base_url('auth/forgot'));
            }
    }
    }

    public function reset_pass($token)
    {
        $data = array(
			'title'		  => 'Atur Ulang Kata Sandi Anda',
            'token'        => $token,
		);
		return view('auth/reset_pass', $data);
    }

    public function proses_reset()
    {
        if(!$this->validate([
				
            'password' => ['rules'=>'required|min_length[8]',
                             'errors'=>[ 'required'=>  'Kata Sandi wajib diisi',
                                         'min_length'=> 'Kata Sandi minimal 8 karakter']

                              ],
            'cpassword' => ['rules'=> 'required|matches[password]',
                             'errors'=>[ 'required'=>  'Kata Sandi wajib diisi',
                                         'matches'=> 'Kata Sandi Harus sama']
                              ],

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to(base_url('/recipe/create'))->withInput()->with('validation',$validation);
            return redirect()->to(base_url('auth/reset_pass/'.$this->request->getVar('token')))->withInput();
        }
        $token = $this->reset_pass->Search_Token($this->request->getVar('token'));
        if ($token['keterangan'] == 0 ) {
            $this->user->updatePass(
                $token['id_user'],
                password_hash($this->request->getVar('cpassword'), PASSWORD_DEFAULT)
            );
        } else {
        session()->setFlashdata('pesan', 'Token Sudah Pernah digunakan');
        return redirect()->to(base_url('auth/forgot'));
        }
        // dd($this->reset_pass->Search_Token($this->request->getVar('token')));
        session()->setFlashdata('sukses', "Password Berhasil di reset");
        return redirect()->to(base_url('auth'));
    }
    




    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto');

        session()->setFlashdata('pesan', 'Anda telah Logout dari sistem...');
        return redirect()->to(base_url('auth'));
    }
}
