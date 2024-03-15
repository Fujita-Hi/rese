<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'name',
        'area',
        'genre',
        'summary',
        'url',
    ];
    
    public function scopeAreaSearch($query, $area){
        if (!empty($area)) {
            $query->where('area', $area);
        }
    }
    public function scopeGenreSearch($query, $genre){
        if (!empty($genre)) {
            $query->where('genre', $genre);
        }
    }
    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('area', 'like', '%' . $keyword . '%')
            ->orWhere('genre', 'like', '%' . $keyword . '%')
            ->orWhere('summary', 'like', '%' . $keyword . '%');
        }
    }
}
