<?php

namespace App\Admin\Controllers;

use App\Shipping;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ShippingsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Shipping';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Shipping());
        
        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('shipping_type', __('Shipping type'));
        $grid->column('name',__('Name'));
        $grid->column('main_id', __('Main id'));
        $grid->column('lang_id', __('Lang id'));
        $grid->column('price', __('Price'));
        $grid->column('luggage', __('Luggage'));
        $grid->column('duration', __('Duration'));
        $grid->column('distance', __('Distance'));
        $grid->column('date', __('Date'));
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
        $show = new Show(Shipping::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('shipping_type', __('Shipping type'));
        $show->field('name',__('Name'));
        $show->field('main_id', __('Main id'));
        $show->field('lang_id', __('Lang id'));
        $show->field('price', __('Price'));
        $show->field('luggage', __('Luggage'));
        $show->field('duration', __('Duration'));
        $show->field('distance', __('Distance'));
        $show->field('date', __('Date'));
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
        $form = new Form(new Shipping());

        $form->select('shipping_type', __('Shipping type'))->options(\App\ShippingType::pluck('name','id'));
        $form->text('name',__('Name'));
        $form->select('main_id', __('Main Id'))->options(\App\Shipping::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang id'))->options(\App\Locale::pluck('title','id'))->default('1');
        $form->number('price', __('Price'));
        $form->number('luggage', __('Luggage'));
        $form->number('duration', __('Duration'));
        $form->number('distance', __('Distance'));
        $form->date('date', __('Date'))->default(date('Y-m-d'));

        return $form;
    }
}
