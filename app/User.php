<?php



namespace App;



use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;



class User extends Authenticatable

{

    use Notifiable, HasApiTokens;



    public const AGENT='agent';

    public const SUPERVISOR='supervisor';

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'phone_number','role'

    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password', 'remember_token',

    ];



    /**

     * The attributes that should be cast to native types.

     *

     * @var array

     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];

    

    public function wareHouse()

    {

        return $this->hasOne('App\TblWarehouse','id','warehouse_id');

    }

     

    public function localState()

    {

        return $this->hasOne('App\TblState','id','local_address_state');

    }

    public function localCity()

    {

        return $this->hasOne('App\TblCity','id','local_address_city');

    }

    

    public function permanentState()

    {

        return $this->hasOne('App\TblState','id','permanent_address_state');

    }

    public function permanentCity()

    {

        return $this->hasOne('App\TblCity','id','permanent_address_city');

    }

    public function bankName()

    {

        return $this->hasOne('App\TblBank','id','bank_name');

    }

}

