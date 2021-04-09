<?php
namespace app\modules\top_banket\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\widgets\FilterWidget;
use common\models\Pages;
use common\models\Filter;
use common\models\Slices;
use common\models\elastic\ItemsFilterElastic;
use frontend\modules\top_banket\models\ElasticItems;
use common\models\Seo;

class SiteController extends Controller
{
    //public function getViewPath()
    //{
    //    return Yii::getAlias('@app/modules/svadbanaprirode/views/site');
    //}

    public function actionIndex()
    {
        $filter_model = Filter::find()->with('items')->where(['active' => 1])->orderBy(['sort' => SORT_ASC])->all();
        $slices_model = Slices::find()->all();
        $seo = $this->getSeo('index');
        $this->setSeo($seo);

        $filter = FilterWidget::widget([
            'filter_active' => [],
            'filter_model' => $filter_model
        ]);

        $elastic_model = new ElasticItems;
        $items = new ItemsFilterElastic([], 10, 1, false, 'restaurants', $elastic_model);
        $mainWidget = $this->renderPartial('//components/generic/profitable_offer.twig', [
            'items' => $items->items,
            'city_rod' => Yii::$app->params['subdomen_rod'],
        ]);

        return $this->render('index.twig', [
            'filter' => $filter,
            'count' => $items->total,
            'mainWidget' => $mainWidget,
            'seo' => $seo,
            'subid' => isset(Yii::$app->params['subdomen_id']) ? Yii::$app->params['subdomen_id'] : false
        ]);
    }

    public function actionError()
    {
        return $this->render('error.twig');
    }

    public function actionRobots()
    {
        header('Content-type: text/plain');
        if(Yii::$app->params['subdomen_alias']){
            $subdomen_alias = Yii::$app->params['subdomen_alias'].'.';
        }
        else{
            $subdomen_alias = '';
        }
        echo 'User-agent: *
Disallow: /*rest_type=
Disallow: /*chelovek=
Disallow: /*price=
Disallow: /*firework=
Disallow: /*svoy-alko=
Sitemap: https://'.$subdomen_alias.'korporativ-ng.ru/sitemap/';
        exit;
    }

    private function getSeo($type, $page=1, $count = 0){
        $seo = new Seo($type, $page, $count);

        return $seo->seo;
    }

    private function setSeo($seo){
        $this->view->title = $seo['title'];
        $this->view->params['desc'] = $seo['description'];
        $this->view->params['kw'] = $seo['keywords'];
    }
}
