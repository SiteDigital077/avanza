<?php

namespace DigitalsiteSaaS\Avanza\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Avanzaempresa extends Model
{
	use UsesTenantConnection;
	protected $table = 'avanza_empresa';
	public $timestamps = true;
}
