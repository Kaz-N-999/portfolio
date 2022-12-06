<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    use HasFactory;
    //関連付けるテーブル
    protected $table = 'report';

    // 登録・更新可能なカラムの指定
    protected $fillable = [
        'prefecture',
        'city',
        'comment',
        'img_name',
        'path',
    ];

    public function deleteBookById($id)
    {
        return $this->destroy($id);
    }
}
