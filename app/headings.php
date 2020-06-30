<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class headings extends Model
{
    protected $table = 'headings';
    protected $fillable = ['title', 'id_parent'];
    public function articles()
    {
        return $this->hasMany(article::class, "id", "id");
    }
}
