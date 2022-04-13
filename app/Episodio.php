<?php
namespace App;

use Illuminta\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido'];

    public function serie()
    {
        return $this->belogsTo(Serie::class);
    }

}
