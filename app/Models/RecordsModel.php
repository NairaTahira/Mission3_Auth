<?php

namespace App\Models;
use CodeIgniter\Model;

class RecordsModel extends Model{
    protected $table = 'records';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'type', 'role', 'username', 'password_hash', 'name', 'nim', 'age', 'course_code', 'course_name', 'credits', 'enrollments'
    ];


}