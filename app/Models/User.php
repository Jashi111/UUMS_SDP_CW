<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'birth_date',
        'gender',
        'nic',
        'mobile_number',
        'address',
        'prof_pic',
        'role',
        'academic_year',
        'school',
        'status',
        'student_1st_logging',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    static public function getAdminRec(){

        $return = self::SELECT('users.*')
                        ->WHERE('users.role','=','Admin');

                        //Search Filters applied to Admin user List
                        if (!empty(Request::get('name'))) {
                            $return = $return->WHERE('first_name','LIKE', '%'.Request::get('name').'%')
                                                ->ORWHERE('last_name','LIKE', '%'.Request::get('name').'%');
                        }

                        if (!empty(Request::get('email'))) {
                            $return = $return->WHERE('email','LIKE', '%'.Request::get('email').'%');
                        }

        $return = $return->WHERE('role','=','Admin')
                            ->ORDERBY('id', 'asc')
                            ->paginate(5);

        return $return;
    }
    static public function getStaffRec(){

        $return = self::SELECT('users.*')
                        ->WHERE('users.role','=','Staff');

                        //Search Filters applied to Management staff user List
                        if (!empty(Request::get('name'))) {
                            $return = $return->WHERE('first_name','LIKE', '%'.Request::get('name').'%')
                                                ->ORWHERE('last_name','LIKE', '%'.Request::get('name').'%');
                        }

                        if (!empty(Request::get('email'))) {
                            $return = $return->WHERE('email','LIKE', '%'.Request::get('email').'%');
                        }

        $return = $return->WHERE('role','=','Staff')
                            ->ORDERBY('id', 'asc')
                            ->paginate(5);

        return $return;
    }
    static public function getLecturerRec(){

        $return = self::SELECT('users.*')
                        ->WHERE('users.role','=','Lecturer');

                        //Search Filters applied to Management staff user List
                        if (!empty(Request::get('name'))) {
                            $return = $return->WHERE('first_name','LIKE', '%'.Request::get('name').'%')
                                                ->ORWHERE('last_name','LIKE', '%'.Request::get('name').'%');
                        }

                        if (!empty(Request::get('email'))) {
                            $return = $return->WHERE('email','LIKE', '%'.Request::get('email').'%');
                        }

        $return = $return->WHERE('role','=','Lecturer')
                            ->ORDERBY('id', 'asc')
                            ->paginate(5);

        return $return;
    }

    static public function getStudentsRec(){

        $return = self::SELECT('users.*')
                        ->WHERE('users.role','=','Student');

                        //Search Filters applied to Management staff user List
                        if (!empty(Request::get('name'))) {
                            $return = $return->WHERE('first_name','LIKE', '%'.Request::get('name').'%')
                                                ->ORWHERE('last_name','LIKE', '%'.Request::get('name').'%');
                        }

                        if (!empty(Request::get('email'))) {
                            $return = $return->WHERE('email','LIKE', '%'.Request::get('email').'%');
                        }

        $return = $return->WHERE('role','=','Student')
                            ->ORDERBY('id', 'asc')
                            ->paginate(5);

        return $return;
    }

    static public function getRecByID($id){

        return self::findOrFail($id);
    }

    static public function getUserRec($role){

        $return = self::SELECT('users.*')
                        ->WHERE('status','=','Active')
                        ->WHERE('users.role','=',$role);

        $return = $return->count();

        return $return;
    }
}
