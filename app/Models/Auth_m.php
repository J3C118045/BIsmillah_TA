<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Auth_m extends Model
{
    public function login($username)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            // 'password' => $password,
        ])->get()->getRowArray();
    }

    public function cek_email($email)
    {
        return $this->db->table('user')->where([
            'email' => $email,
            // 'password' => $password,
        ])->get()->getRowArray();
    }
}