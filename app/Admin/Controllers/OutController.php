<?php

namespace App\Admin\Controllers;

use App\Out;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OutController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Out';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Out());
        $grid->column('id', __('Id'));
        $grid->column('main_id','Main Id');
        $grid->column('lang_id','Lang Id');
        $grid->column('name', __('Name'));

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
        $show = new Show(Out::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('main_id','Main Id');
        $show->field('lang_id','Lang Id');
        $show->field('name', __('Name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Out());

        $form->select('main_id', __('Main Id'))->options(\App\Out::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('name', __('Name'));

        return $form;
    }
}
