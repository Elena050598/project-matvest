<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class redactor extends Model
{
    protected $table = 'redactor';
    protected $fillable = ['mission ', 'target ', 'tasks ', 'titleindex', 'headings ', 'is_necessary ', 'attention', 'infa', 'file'];
}
