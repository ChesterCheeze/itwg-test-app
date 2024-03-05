<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class nonSubUser extends Model
{
    use HasFactory;

    private $user;
    protected $fillable;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->fillable = array_merge($this->user->getFillable(), ['phone']);
    }

}
