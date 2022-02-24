<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;
    /**
 * fillable
 *
 * @var array
 */
 protected $fillable = [
    'name', 'email', 'password', 'avatar'
    ];
    /**
    * hidden
    *
    * @var array
    */
    protected $hidden = [
    'password',
    'remember_token',
    ];
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
     * getAvatarAttribute
     *
     * @param mixed $avatar
     * @return void
     */
    public function getAvatarAttribute($avatar)
    {
    if ($avatar != null) :
    return asset('storage/donaturs/'.$avatar);
    else :
    return 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->name) . '&background=4e73df&color=ffffff&size=100';
    endif;
 }

}
