<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    /**
 * fillable
 *
 * @var array
 */
 protected $fillable = [
    'title', 'slug', 'category_id', 'target_donation', 'max_date',
   'description', 'image', 'user_id',
    /**
     * category
     *
     * @return void
     */
    public function category()
    {
    return $this->belongsTo(Category::class);
    ];
    }
    /**
     * user
     *
     * @return void
    */
    public function user()
     {
     return $this->belongsTo(User::class);
     }
     /**
     * donations
     *
     * @return void
     */
    public function donations()
    {
    return $this->hasMany(Donation::class);
    }
    /**
     * sumDonation
     *
     * @return void
     */
    public function sumDonation()
    {
    return
    $this->hasMany(Donation::class)->selectRaw('donations.campaign_id,SUM(do
    nations.amount) as total')->where('donations.status',
    'success')->groupBy('donations.campaign_id');
    }
        /**
     * getImageAttribute
     *
     * @param mixed $image
     * @return void
     */
    public function getImageAttribute($image)
    {
    return asset('storage/campaigns/'.$image);
    }
}
