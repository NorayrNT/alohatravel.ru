<?php

namespace App\Admin\Controllers;

use App\Currency;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CurrencyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Currency';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Currency());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('rate', __('Rate'));
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
        $show = new Show(Currency::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('rate', __('Rate'));
        $show->field('symbol',__('Symbol'));
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
        $form = new Form(new Currency());

        $form->text('title', __('Title'));
        $form->text('rate', __('Rate'));
        $form->text('symbol',__('Symbol'));

        return $form;
    }
}
