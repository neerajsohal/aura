<?php 

namespace Aura;

class Aura {

	public function detect($environments) {
	
		if ($environments instanceof Closure) {
			return call_user_func($environments);
		}

		foreach ($environments as $environment => $hosts) {
			foreach ((array) $hosts as $host) {
				if ($this->isMachine($host)) return $environment;
			}
		}

		return 'production';
	}

	public function isMachine($name) {
		return str_is($name, gethostname());
	}

}
