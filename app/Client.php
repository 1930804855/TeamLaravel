<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //指定表名
    protected $table='client';
    //指定主键
  	protected $primaryKey='c_id';
  	//关闭时间戳
  	public $timestamps=false;
}
