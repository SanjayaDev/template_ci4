<?php

namespace App\Models;

use CodeIgniter\Model;

class Authentication_model extends Model
{
	protected $table                = 'session_tokens';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $protectFields        = true;
	protected $allowedFields        = ["user_id", "token", "created_at", "expired_at", "is_logout"];
}
