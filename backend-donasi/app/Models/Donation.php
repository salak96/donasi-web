<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    /**
 * fillable
 *
 * @var array
 */
 protected $fillable = [
    'invoice', 'campaign_id', 'donatur_id', 'amount', 'pray',
   'status', 'snap_token'
    ];
    /**
     * campaign
     *
     * @return void
     */
    public function campaign()
    {
    return $this->belongsTo(Campaign::class);
    }
    /**
     * donatur
     *
     * @return void
     */
    public function donatur()
    {
    return $this->belongsTo(Donatur::class);
    }
        /**
     * getCreatedAtAttribute
     *
     * @param mixed $date
     * @return void
     */
    public function getCreatedAtAttribute($date)
    {
    return Carbon::parse($date)->format('d-M-Y');
    }
    /**
     * getUpdatedAtAttribute
     *
     * @param mixed $date
     * @return void
     */
    public function getUpdatedAtAttribute($date)
    {
    return Carbon::parse($date)->format('d-M-Y');
    }
}
