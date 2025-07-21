<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // pastikan sesuai dengan nama tabel di database
    protected $primaryKey = 'id';

   protected $allowedFields = ['nama', 'username', 'email', 'password', 'role'];
    protected $useTimestamps = true;
}
