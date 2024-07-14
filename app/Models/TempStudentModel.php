<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempStudentModel extends Model
{
    use HasFactory;
    protected $table = 'temp_students';
    protected $fillable = [
        'email',
        'addedby',
        'addeddate',
    ];

    static public function getTempStudentRec($email){

        $return = self::WHERE('email', $email)
                        ->first();

        return $return;

    }
}
