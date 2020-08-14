<?php

namespace App\Admin\Controllers;

use App\Locale;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LocaleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Locale';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Locale());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('name', __('Name'));
        $grid->column('symbol', __('Symbol'));

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
        $show = new Show(Locale::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('name', __('Name'));
        $show->field('symbol', __('Symbol'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Locale());

        $form->text('title', __('Title'));
        $form->text('name', __('Name'));
        $form->image('symbol', __('Symbol'))->move('uploads/images/locale')->removable();

        return $form;
    }
}
