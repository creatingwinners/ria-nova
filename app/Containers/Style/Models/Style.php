<?php

namespace App\Containers\Style\Models;

use App\Containers\Customer\Models\Customer;
use App\Containers\Trail\Models\Trail;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Style.
 *
 * @author Karel van Zijl <karel@creatingwinners.com>
 */
class Style extends Model
{

    protected $casts = [
        'attributes' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // public function trails()
    // {
    //     return $this->morphedByMany(Trail::class, 'styleable');
    // }

    // public function customers()
    // {
    //     return $this->morphedByMany(Customer::class, 'styleable');
    // }
}
