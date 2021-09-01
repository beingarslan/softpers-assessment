<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'roll_num',
        'tester',
        'file_id',
        'created_at',
        'updated_at'
    ];

    public function file(){
        return $this->belongsTo(File::class, 'file_id', 'id');
    }
}
