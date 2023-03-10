<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class Branch
 * @package App
 * @property integer id
 * @property string name
 * @property string address
 * @property boolean is_main
 * @property Collection shipments
 * @mixin Builder
 */
class Branch extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'address',
        'is_main'
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::creating(function(self $instance) {
            if($instance->is_main) {
                DB::table($instance->getTable())->where('is_main', '=', true)->update(['is_main' => false]);
            }
        });
        self::updating(function(self $instance) {
            if($instance->is_main) {
                DB::table($instance->getTable())->where('is_main', '=', true)->update(['is_main' => false]);
            }
        });
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function identifiableName()
    {
        return $this->name;
    }

}
