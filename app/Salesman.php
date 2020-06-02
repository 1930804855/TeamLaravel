<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    //指定表名
    protected $table='salesman';
    //指定主键
    protected $primaryKey='s_id';
    //关闭时间戳
    public $timestamps=false;
}
