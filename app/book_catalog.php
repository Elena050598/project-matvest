<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class book_catalog extends Model
{
    protected $table = 'book_catalog';
    protected $fillable = ['image', 'short_description', 'title'];
    public function books()
    {
        return $this->hasMany(books::class, "id", "id");
    }
}
