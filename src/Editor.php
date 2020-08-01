<?php

namespace CLJAMAL\CKEditor4;

use Encore\Admin\Form\Field\Textarea;

class Editor extends Textarea
{
    protected $view = 'cljamal-ckeditor::editor';

    protected static $js = [
	    'vendor/cljamal/ckeditor4/ckeditor.js',
//	    'vendor/ghost/ckeditor/translations/zh-cn.js',
    ];

    public function render()
    {
        $config = (array) CKEditor::config('config');

        $config = array_merge($config, $this->options);
	    $config['simpleUpload']['headers'] = ['X-CSRF-TOKEN' => csrf_token()];
	    $config = json_encode($config);
        $this->script = "CKEDITOR.replace( document.querySelector( '#{$this->id}' ),{$config} )";

        return parent::render();
    }
}
