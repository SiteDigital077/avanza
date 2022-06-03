<?php

namespace DigitalsiteSaaS\Avanza\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model

{
	use UsesTenantConnection;
	protected $table = 'promociones';
	public $timestamps = true;

}