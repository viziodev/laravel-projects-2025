<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory,SoftDeletes;
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
