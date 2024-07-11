<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    //protected $fillable =['title','price','description','is_active'];
    protected $guarded=[];
    public function category(){
        return  $this->belongsTo(Category::class, 'category_id');
      }
}
