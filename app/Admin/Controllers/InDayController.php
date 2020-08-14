<?php

namespace App\Admin\Controllers;

use App\InDay;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InDayController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\InDay';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new InDay());

        $grid->column('id', __('Id'));
        $grid->column('in_tour_id', __('In tour id'));
        $grid->column('main_id','Main Id');
        $grid->column('lang_id','Lang Id');
        $grid->column('places', __('Places'))->limit(10);
        $grid->column('desc',__('Desc'))->limit(10);
        $grid->column('images', __('Images'));
        $grid->column('include', __('Include'))->limit(20);
        $grid->column('exclude', __('Exclude'))->limit(20);
        $grid->column('notes', __('Notes'))->limit(20);


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
        $show = new Show(InDay::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('in_tour_id', __('In tour id'));
        $show->field('main_id','Main Id');
        $show->field('lang_id','Lang Id');
        $show->field('places', __('Places'));
        $show->field('desc', __('Desc'));
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
        $form = new Form(new InDay());
        
        $form->select('in_tour_id', __('In tour id'))->options(\App\InTour::where('main_id',null)->pluck('name','id'));
        $form->select('main_id', __('Main Id'))->options(\App\InDay::where('main_id',null)->pluck('places','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('places', __('Places'));
        $form->ckeditor('desc',__('Desc'));
        $form->multipleImage('images', __('Images'))->move("uploads/images/tours/incoming")->removable();

        return $form;
    }
}
