<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marker extends Model
{
    use HasFactory;
    //関連付けるテーブル
    protected $table = 'marker';
    //タイムスタンプを無効化
    public $timestamps = false;

    // 登録・更新可能なカラムの指定
    protected $fillable = [
        'lat',
        'lng',
    ];
    protected $casts = [
        'lat' => 'float'
    ];
    
}