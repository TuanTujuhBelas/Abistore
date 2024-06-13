<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['transaction_id','products_id'];
    protected $hidden = [];

    public function details(){
        return $this->belongTo(Transaction::class,'transactions_id','id');
    }

  public function product()
  {
      return $this->belongsTo(Product::class, 'products_id', 'id');
  }
}
