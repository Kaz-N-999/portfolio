<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class report extends Model
{
    use HasFactory;
    //関連付けるテーブル
    protected $table = 'reports';

    // 登録・更新可能なカラムの指定
    protected $fillable = [
        'prefecture',
        'city',
        'comment',
        'img_name',
        'path',
    ];

    // リレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //IDを探して削除
    public function deleteBookById($id)
    {
        return $this->destroy($id);
    }
}
