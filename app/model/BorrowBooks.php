<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin \think\Model
 */
class BorrowBooks extends Model
{
    protected $table = 'table_borrowbooks';
    protected $pk = 'id';
}
