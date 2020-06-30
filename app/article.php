<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['heading', 'title', 'annotation', 'slug', 'file1', 'file2', 'file3', 'user_id','published','access'];
    public function users()
    {
        return $this->belongsToMany(User::class, "article_author");
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function getHeading()
    {
        return $this->belongsTo(headings::class, "heading", "id");
    }
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }
    public function scopeAccess($query)
    {
        return $query->where('access','=', 1)->orWhere('user_id','=',Auth::user()->id);
    }
}
