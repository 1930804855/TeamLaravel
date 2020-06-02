<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_industry extends Model
{
    //指定表名
    protected $table='client_industry';
    //指定主键
    protected $primaryKey='i_id';
    //关闭时间戳
    public $timestamps=false;
}
