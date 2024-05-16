<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;                                 

class Voucher extends Model
{
    public $timestamps = false;
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_vouchers';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $voucher = [
        'json_params' => 'object',
    ];
    public static function exists($voucher_code)
    {
        return static::where('voucher_code', $voucher_code)->exists();
    }
}
