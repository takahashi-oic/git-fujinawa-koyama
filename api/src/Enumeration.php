<?php
	abstract class Enumeration {
		private $value;

		public function __construct($value) {
			$ref = new ReflectionObject($this);
			$const = $ref->getConstants();

			if(!in_array($value, $const, true)) {
				throw new InvalidArgumentException;
			}

			$this->value = $value;
		}

		final public static function __callStatic($label, $args) {
			$class = get_called_class();
			$const = constant("$class::$label");
			return new $class($const);
		}

		final public function __toString() {
			return (string)$this->value;
		}
	}
?>
