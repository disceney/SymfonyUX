<?php

namespace App\Traits;

trait DataTrait
{
	public static function getData () : array
	{
		$data = [];

		for ($i = 0; $i <= 50; $i++) {
			$data["Value {$i}"] = "Element {$i}";
		}

		return $data;
	}
}
