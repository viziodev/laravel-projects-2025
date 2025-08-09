<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false; 

    
    /**
     * Get the users associated with the role.
     */
    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
   
}
