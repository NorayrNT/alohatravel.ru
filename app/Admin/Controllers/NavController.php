<?php

namespace App\Admin\Controllers;

use App\Nav;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NavController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Nav';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Nav());

        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('main_id', __('Main id'));
        $grid->column('lang_id', __('Lang id'));
        $grid->column('order',__('Order'));
        $grid->column('name', __('Name'));
        $grid->column('url', __('Url'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Nav::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('main_id', __('Main id'));
        $show->field('lang_id', __('Lang id'));
        $show->field('order',__('Order'));
        $show->field('name', __('Name'));
        $show->field('url', __('Url'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Nav());

        $form->select('parent_id','Parent Id')->options(\App\Nav::where('main_id',null)->pluck('name','id'));
        $form->select('main_id', __('Main Id'))->options(\App\Nav::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->number('order',__('Order'));
        $form->text('name', __('Name'));
        $form->text('url', __('Url'));

        return $form;
    }
}
