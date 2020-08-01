<?php

namespace CLJAMAL\CKEditor4;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class CKEditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(CKEditor $extension)
    {
        if (! CKEditor::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'cljamal-ckeditor');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/cljamal/ckeditor4')],
                'cljamal-ckeditor'
            );
        }

	    Admin::booting(function () {
		    Form::extend('editor', Editor::class);
	    });
    }
}
