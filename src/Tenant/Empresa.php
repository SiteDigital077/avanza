<?php

namespace DigitalsiteSaaS\Avanza\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model

{
	use UsesTenantConnection;
	protected $table = 'empresaavan';
	public $timestamps = true;

}