<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransaksiItem;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'total_harga', 'transaksi_code'
    ];
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->transaksi_code = $model->getRandomString();
        });
    }

    public function generateRandomString($length = 6)
    {
        $char = '01234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLength = strlen($char);
        $randomString = '';
        for($i=0; $i < $length; $i++){
            $randomString .= $char[rand(0,$charLength - 1)];
        }
        return $randomString . "" . date("ymdHis");
    }

    public function getRandomString()
    {
        $str = $this->generateRandomString();
        return $str;
    }

    public function items()
    {
        return $this->hasMany(TransaksiItem::class, 'id_transaksi');
    }


}
