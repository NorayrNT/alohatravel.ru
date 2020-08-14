<?php

namespace App\Admin\Controllers;

use App\Extreme;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ExtremeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Extreme';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Extreme());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'))->limit(25);
        $grid->column('desc', __('Desc'))->limit(25);
        $grid->images('images', __('Images'));
        $grid->column('price', __('Price'));
        $grid->column('active', __('Active'));

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
        $show = new Show(Extreme::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('desc', __('Desc'));
        $show->field('images', __('Images'));
        $show->field('price', __('Price'));
        $show->switch('active', __('Active'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Extreme());

        $form->select('main_id', __('Main Id'))->options(\App\Extreme::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('name', __('Name'));
        $form->ckeditor('desc', __('Desc'));
        $form->number('price', __('Price'));
        $form->switch('active',__('Active'))->default(true);
        $form->image('images', __('Images'))->move('uploads/images/tours/extreme')->removable();
        
        return $form;
    }
}
