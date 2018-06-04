<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $fillable =
	[
		'title', 'chapters', 'volumes', 'description', 'published'
	];
}
