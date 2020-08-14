<?php

namespace App\Admin\Controllers;

use App\Apartment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ApartmentsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Apartment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Apartment());

        $grid->column('id', __('Id'));
        $grid->column('price', __('Price'));
        $grid->column('address', __('Address'));
        $grid->column('floors', __('Floors'));
        $grid->column('bedrooms', __('Bedrooms'));
        $grid->column('rooms', __('Rooms'));
        $grid->column('satellite', __('Satellite'));
        $grid->column('ac', __('Ac'));
        $grid->column('wifi', __('Wifi'));
        $grid->column('wash', __('Wash'));
        $grid->column('elevator', __('Elevator'));
        $grid->images('images', __('Images'));
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
        $show = new Show(Apartment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('price', __('Price'));
        $show->field('address', __('Address'));
        $show->field('floors', __('Floors'));
        $show->field('bedrooms', __('Bedrooms'));
        $show->field('rooms', __('Rooms'));
        $show->field('satellite', __('Satellite'));
        $show->field('ac', __('Ac'));
        $show->field('wifi', __('Wifi'));
        $show->field('wash', __('Wash'));
        $show->field('elevator', __('Elevator'));
        $show->field('images', __('Images'));
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
        $form = new Form(new Apartment());

        $form->number('price', __('Price'));
        $form->text('address', __('Address'));
        $form->number('floors', __('Floors'));
        $form->select('bedrooms', __('Bedrooms'))->options(['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6',]);
        $form->select('rooms', __('Rooms'))->options(['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6',]);
        $form->switch('satellite', __('Satellite'));
        $form->switch('ac', __('Ac'));
        $form->switch('wifi', __('Wifi'));
        $form->switch('wash', __('Wash'));
        $form->switch('elevator', __('Elevator'));
        $form->multipleImage('images', __('Images'))->move("uploads/images/services/apartments")->sortable()->removable();

        return $form;
    }
}
