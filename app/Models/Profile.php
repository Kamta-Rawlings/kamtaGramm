<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //use HasFactory;
    //Adding the relationship(in my case is a 1to 1 relationship)
    
    protected $guarded = [];

    public function profileImage()
    {
     $imagePath = ($this->image) ?  $this->image : 'profile/jLmPMCOgqAMiXNRJg3jH9DXObGq1uikMtoahpYiV.png';
      return '/storage/'. $imagePath;
    }

    public function followers()
    {
       return $this->belongsToMany(User::class);
    }
    
    public function user()
    {
       return $this->belongsTo(User::class);
    }

}
