<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class reset_model_m extends Model
{
    public function Create_Token($data)
    {
        $this->db->table('reset_password')->insert($data);

    }

    
}