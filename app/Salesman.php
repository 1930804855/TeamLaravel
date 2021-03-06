<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    /**
    * 关联到模型的数据表 
    *
    * @var string 
    */ 
    protected $table = 'salesman';

    /**
    * The primary key associated with the table. 
    * 主键
    * @var string 
    */ 
    protected $primaryKey = 's_id';

    /**
    * 表明模型是否应该被打上时间戳 
    *
    * @var bool 
    */ 
    public $timestamps = false;

    /**
    * The attributes that aren't mass assignable. 
    * 黑名单
    * @var array 
    */ 
    protected $guarded = [];
}
