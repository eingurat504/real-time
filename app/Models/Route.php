<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'routes';
    // protected $table = 'tblbmc_route';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'origin_id',
        'destination_id',
    ];

       /**
     * Location belonging to this route.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function origin()
    {
        // return $this->belongsTo(Location::class, 'origin_id', 'id');
    }

    /**
     * Location belonging to this route.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function destination()
    {
        // return $this->belongsTo(Location::class, 'destination_id', 'id');
    }

}
