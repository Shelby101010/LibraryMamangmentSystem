<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class Books extends Model
{
    protected $table = 'table_books';
    protected $pk = 'id';
}
