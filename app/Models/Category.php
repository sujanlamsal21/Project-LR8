<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ="categories";

    protected $fillable = [
        'user_id',
        'category_name',
    ];

    public $primaryKey ='id';

    public $timestamps = true;

    public function user(){
       return $this->hasOne(User::class, 'id', 'user_id');
    }
}
