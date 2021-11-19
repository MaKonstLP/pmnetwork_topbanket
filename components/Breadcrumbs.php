<?php

namespace frontend\modules\top_banket\components;

use Yii;

class Breadcrumbs {
	public static function get_breadcrumbs($level, $h1='') {
		switch ($level) {
			case 1:	
				$breadcrumbs=[
					'/' => 'Банкеты ',
				];
				break;
			case 2:
				$breadcrumbs=[
					'/' => 'Банкеты ',
					'/ploshhadki/' => $h1,
				];
				break;
		}
		return $breadcrumbs;
	}
}