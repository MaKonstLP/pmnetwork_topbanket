<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\modules\top_banket\assets\AppAsset;
use common\models\Subdomen;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" type="image/png" href="/img/ny_ball.png">
    <title><?php echo $this->title ?></title>
    <?php $this->head() ?>
    <?php if (!empty($this->params['desc'])) echo "<meta name='description' content='".$this->params['desc']."'>";?>
    <?php if (!empty($this->params['kw'])) echo "<meta name='keywords' content='".$this->params['kw']."'>";?>
    <?= Html::csrfMetaTags() ?>

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTTPDSK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php $this->beginBody() ?>

    <div class="main_wrap">
        
        <header>
            <div class="header_wrap">
                <div class="header_upper_menu">
                    <div class="ref_container">
                        <a href="">10 человек</a>
                        <a href="">20 человек</a>                   
                        <a href="">30 человек</a>
                        <a href="">40 человек</a>
                        <a href="/blog/">СТАТЬИ</a> 
                    </div>
                    <div class="header_burger">
                        <div></div>
                        <div></div>
                        <div></div>              
                    </div>
                    <div class="ref_wrapper">
                        <a href="">10 человек</a>
                        <a href="">20 человек</a>                 
                        <a href="">30 человек</a>
                        <a href="">40 человек</a>
                        <a href="/blog/">СТАТЬИ</a> 
                    </div>                                  
                </div>
                <div class="header_menu">

                    <a href="/" class="header_logo">

                        <div class="header_logo_img"></div>
                        <div class="header_logo_text">
                            <span>topbanket</span>
                        </div>
                        
                    </a>

                    <div class="Desc">
                        <span class="Desc_text">  
                            Сервис подбор банкетных залов 
                            и площадок для любых мероприятий
                        </span>
                    </div>

                    <div class="city_select_search_wrapper _hide">
                        <div class="cross_city_select"></div>                       
                        <h4>Выберите город</h4>
                             <div class="city_select_list">

                            <?php
                                $subdomen_list = Subdomen::find()
                                    ->where(['active' => 1])
                                    ->orderBy(['name' => SORT_ASC])
                                    ->all();

                                function createCityNameLine($city){
                                    if($city->alias){
                                        $newLine = "<div class='city_checkbox' data-action='city_checkbox' data-href='https://$city->alias.korporativ-ng.ru'>
                                                    <input type='checkbox' name='city' class='personalData' checked='' data-required>
                                                    <p class='checkbox_pseudo'>$city->name</p>
                                                    </div>";
                                    }
                                    else{
                                        $newLine = "<div class='city_checkbox' data-action='city_checkbox' data-href='https://korporativ-ng.ru'>
                                                    <input type='checkbox' name='city' class='personalData' checked='' data-required>
                                                    <p class='checkbox_pseudo'>$city->name</p>
                                                    </div>";
                                    }
                                    return $newLine;
                                }

                                function createLetterBlock($letter){
                                    $newBlock = "<div class='city_select_letter_block' data-first-letter=$letter>";
                                    return $newBlock;
                                }

                                function createCityList($subdomen_list){
                                    $citiesListResult = "";
                                    $currentLetterBlock = "";

                                    foreach ($subdomen_list as $key => $subdomen){
                                        $currentFirstLetter = substr($subdomen->name, 0, 1);
                                        if ($currentFirstLetter !== $currentLetterBlock){
                                            $currentLetterBlock = $currentFirstLetter;
                                            $citiesListResult .= "</div>";
                                            $citiesListResult .= createLetterBlock($currentLetterBlock);
                                            $citiesListResult .= createCityNameLine($subdomen);
                                        } else {
                                            $citiesListResult .= createCityNameLine($subdomen);
                                        }
                                    }
                                        
                                    $citiesListResult .= "</div>";
                                    echo substr($citiesListResult, 6);

                                }

                                createCityList($subdomen_list);
                            ?>
                        <button class="Red">ВЫБРАТЬ</button>
                        </div>
                        

                    </div>

                        <div class="header_city_selector">
                            <span class="your_city"> Ваш город:</span>
                            <div class="header_city_select _grey_link">

                                <span class="select_city"><?=Yii::$app->params['subdomen_name']?></span>

                            </div>
                        </div>

                        <div class="header_phone">
                            <a href="tel:+79252382207">8 800 800-00-00</a>
                            <div class="header_phone_button">
                                <button class="Aqua"> 
                                    ПОДОБРАТЬ ЗАЛ
                                </button>
                            </div>
                        </div>
                    </div>

                <div class="header_form_popup header_form_popup_callback _hide">
                    <div class="header_form_popup_content">
                    
                        <?= $this->render('../components/generic/form_callback.twig', ['type' => 'header']) ?>
                        <div class="close_button"></div>

                        <div class="header_form_popup_message_sent _hide">

                            <h2>Заявка отправлена</h2>
                            <p class="header_form_popup_message">Константин, спасибо за проявленный интерес. Наши менеджеры свяжутся с вами<br>в течение дня и помогут подобрать зал для корпоратива.</p>
                            <p class="header_form_popup_message_close _link">Понятно, закрыть</p>
                            <div class="close_button"></div>

                        </div>

                    </div>
                </div>

                <div class="header_form_popup header_form_popup_map _hide">
                    <div class="header_form_popup_content">
                    
                        <div class="close_button"></div>
						<div class="form_wrapper map"></div>
												

                    </div>
                </div>
      
                <div class="city_select_search_wrapper _hide">
                        <div class="cross_city_select"></div>                       
                        <h4>Выберите город</h4>
                             <div class="city_select_list">

                           
                        <button class="Red">ВЫБРАТЬ</button>
                        </div>
                        

                    </div>
            </div>
        </header>

        <div class="content_wrap">
            <?= $content ?>
        </div>

        <footer>
            <div class="footer_container">
                <div class="footer_wrap">
                    <div class="footer_row">
                            <a href="/" class="footer_logo">
                                <div class="footer_logo_img"></div>
                                <div class="footer_logo_text">
                                    topbanket
                                </div>
                            </a>
                            <div class="footer_info">
                                <p class="footer_copy">topbanket.ru (с) <?php echo date("Y");?>
                                    
                                </p>
                                <a href="/privacy/" class="footer_pc _link">Политика Конфиденциальности</a>
                            </div>                        
                        <div class="footer_block_right">
                            <div class="footer_phone">
                                <a href="tel:+79252382207">8 800 800-80-80</a>
                            </div>
                            <div class="footer_phone_button">
                                <button class="Aqua">
                                    ПОДОБРАТЬ ЗАЛ
                                </button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div> 

<?php $this->endBody() ?>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&amp;display=swap&amp;subset=cyrillic" rel="stylesheet">
</body>
</html>
<?php $this->endPage() ?>
