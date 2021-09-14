<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FiberSplicePoint extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $table = 'fiber_splice_points';
    protected $fillable = [
        'id',
        'latitude',
        'longitude',
        'fiber_links_id',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $auditInclude = [
        'id',
        'latitude',
        'longitude',
        'fiber_links_id',
    ];

    public function fiber_links(){
        return $this->belongsTo(FiberLink::class);
    }

}
