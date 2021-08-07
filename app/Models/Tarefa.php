<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    // protected $table = 'tarefas';
    // protected $primaryKey = 'id';
    // protected $increment = false;
    // protected $keytype = 'string';

    public $timestamps = false;
    protected $fillable = ['titulo'];

    // const created_at = 'date_created';
    // const update_at = 'date_updated';

}
