<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class books extends Model
{
    protected $table = 'books';
    protected $fillable = ['image', 'description', 'download_link', 'title', 'author', 'catalog'];
    public function book_catalog()
    {
        return $this->belongsTo(book_catalog::class, "catalog", "id");
    }
    public function book(array $data)
    {
        return books::book([
            'id' => $data['id'],
            'title' => $data['title'],
            'image' => $data['image'],
            'description' => $data['description'],
            'author' => $data['author'],
            'download_link' => $data['download_link'],
            'catalog' => $data['catalog'],
            'file' => $data['file']
        ]);
    }
}
