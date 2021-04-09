<?php
namespace app\modules\top_banket\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\elastic\RestaurantElastic;
use frontend\modules\top_banket\components\Breadcrumbs;
use common\models\elastic\ItemsWidgetElastic;
use frontend\modules\top_banket\models\ElasticItems;
use common\models\Seo;

class ItemController extends Controller
{

	public function actionIndex($id)
	{
		$elastic_model = new ElasticItems;
		$item = $elastic_model::get($id);

		$seo = new Seo('item', 1, 0, $item, 'rest');
		$seo = $seo->seo;
        $this->setSeo($seo);

		//$item = ApiItem::getData($item->restaurants->gorko_id);

		$seo['h1'] = $item->restaurant_name;
		$seo['breadcrumbs'] = Breadcrumbs::get_breadcrumbs(2);
		$seo['desc'] = $item->restaurant_name;
		$seo['address'] = $item->restaurant_address;

		$other_rooms = $item->rooms;

		$other_rests = [$item, $item];

		//echo '<pre>';
		//print_r($item);
		//exit;

		return $this->render('index.twig', array(
			'item' => $item,
			'queue_id' => $id,
			'seo' => $seo,
			'other_rooms' => $other_rooms,
			'other_rests' => $other_rests,
		));
	}

	private function setSeo($seo){
        $this->view->title = $seo['title'];
        $this->view->params['desc'] = $seo['description'];
        $this->view->params['kw'] = $seo['keywords'];
    }

}