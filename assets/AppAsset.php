<?php

namespace frontend\modules\top_banket\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/modules/top_banket/web/dist/';
    //public $baseUrl = '@web';
    //public $baseUrl = '@frontend/modules/svadbanaprirode/web';
    public $css = [
        'css/app.min.css',
    ];
    public $js = [
        'js/app.min.js',
    ];
    public function init() {
        $this->css = $this->getVersionedFiles($this->css);
        $this->js = $this->getVersionedFiles($this->js);
        parent::init();
    }

    public function getVersionedFiles($files)
    {
        $out = [];
        foreach ($files as $file) {
            $filePath = \Yii::getAlias($this->sourcePath . $file);
            $out[] = $file . (is_file($filePath) ? '?v=' . filemtime($filePath) : '');
        }
        return $out;
    }
}
