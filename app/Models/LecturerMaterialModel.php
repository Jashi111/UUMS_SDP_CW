<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class LecturerMaterialModel extends Model
{
    use HasFactory;
    protected $table = 'lecturer_material';
    protected $fillable = [
        'subject',
        'document_name',
        'file',
        'lecturer',
        'addeddate',
    ];

    static public function getLMRec(){

        $return = self::SELECT('lecturer_material.*');

                        //Search Filters applied to Admin user List
                        if (!empty(Request::get('subject'))) {
                            $return = $return->WHERE('subject','LIKE', '%'.Request::get('subject').'%');
                        }

        $return = $return->ORDERBY('addeddate', 'desc')
                        ->paginate(5);

        return $return;
    }

}
