<?php

namespace Bantenprov\Anggaran\Models\Bantenprov\Anggaran;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggaran extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'anggarans';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'group_egovernment_id',
        'sector_egovernment_id',
        'user_id',
        'label',
        'description',
        'link'
    ];

    public function group_egovernment()
    {
        return $this->belongsTo('Bantenprov\GroupEgovernment\Models\Bantenprov\GroupEgovernment\GroupEgovernment','group_egovernment_id');
    }

    public function sector_egovernment()
    {
        return $this->belongsTo('Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\SectorEgovernment','sector_egovernment_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
