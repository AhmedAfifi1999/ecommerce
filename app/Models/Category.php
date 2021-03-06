<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory ,SoftDeletes;

    protected $STATUS_ACTIVE='Active';
    protected $statusDraft='draft';

    protected $fillable=['name','slug','parent_id','description','status','image_path'];
    protected $table = "categories";
    protected $primaryKey = "id";
    protected $keyType = "int";

    public $timestamps = true;
    public $incrementing = true;
}
