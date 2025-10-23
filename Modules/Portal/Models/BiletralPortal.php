<?php
namespace Modules\Portal\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Portal\Database\Factories\PortalFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // 👈 import this

class BiletralPortal extends Model
{
     use HasFactory, SoftDeletes; 
    protected $dates = ['deleted_at']; 
    protected $table = 'byletral_portals';
    protected $connection = 'main';
    protected $guarded = [];
    public function primaryCountry()
    {
        return $this->belongsTo(CountryPortal::class, 'primary_country_id');
    }

    public function secondaryCountry()
    {
        return $this->belongsTo(CountryPortal::class, 'secondary_country_id');
    }
}
