<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamesCollection extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'console_id', 'copies', 'publisher_id', 'developer_id', 'language_id', 'fsk_id', 'year', 'cover'];

    public function console()
    {
        return $this->belongsTo(Console::class);
    }

    public function publisher()
    {
        return $this->belongsTo(publisher::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function fsk()
    {
        return $this->belongsTo(Fsk::class);
    }
}
