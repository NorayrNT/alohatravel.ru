<?php

namespace App\Admin\Controllers;

use App\Armenia;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArmeniaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Armenia';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Armenia());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('main_id','Main Id');
        $grid->column('lang_id',"Lang Id");
        $grid->column('name');
        $grid->column('desc')->limit(25);       

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Armenia::findOrFail($id));
        
        $show->field('id', __('Id'));
        $show->field('main id','Main Id');
        $show->field('lang id',"Lang Id");
        $show->field('name',"Name");
        $show->field('desc',"Desc");

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Armenia());
        $form->select('main_id', __('Main Id'))->options(\App\Armenia::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('name', __('Name'));
        $form->ckeditor('desc', __('Desc'));

        return $form;
    }
}
