<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_source extends Model
{
    //指定表名
    protected $table='client_source';
    //指定主键
    protected $primaryKey='l_id';
    //关闭时间戳
    public $timestamps=false;
}
