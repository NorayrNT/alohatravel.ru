<?php

namespace App\Admin\Controllers;

use App\Service;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServicesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Service';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Service());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('main_id', __('Main id'));
        $grid->column('lang_id', __('Lang id'));
        $grid->column('name', __('Name'));
        $grid->column('desc', __('Desc'));
        $grid->column('images', __('Images'));
        $grid->column('url', __('Url'));

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
        $show = new Show(Service::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('main_id', __('Main id'));
        $show->field('lang_id', __('Lang id'));
        $show->field('name', __('Name'));
        $show->field('desc', __('Desc'));
        $show->field('images', __('Images'));
        $show->field('url', __('Url'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Service());

        $form->select('main_id', __('Main Id'))->options(\App\Service::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('name', __('Name'));
        $form->text('desc', __('Desc'));
        $form->image('images', __('Images'))->move('uploads/images/services')->removable();
        $form->text('url', __('Url'));

        return $form;
    }
}
