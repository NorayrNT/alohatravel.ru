<?php

namespace App\Admin\Controllers;

use App\OutTour;
use App\Out;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OutTourController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\OutTour';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OutTour());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('out_id', __('Out id'));
        $grid->column('name', __('Name'));
        $grid->column('desc', __('Desc'))->limit(10);
        $grid->column('price',__('Price'));
        $grid->images();
        $grid->column('duration', __('Duration'));
        $grid->column('include', __('Include'))->limit(10);
        $grid->column('exclude', __('Exclude'))->limit(10);
        $grid->column('notes', __('Notes'))->limit(10);
        $grid->column('map', __('Map'))->limit(10);
        $grid->column('stars', __('Stars'));
        $grid->column('active',__('Active'));
        $grid->column('new', __('New'));
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
        $show = new Show(OutTour::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('out_id', __('Out id'));
        $show->field('name', __('Name'));
        $show->field('desc', __('Desc'));
        $show->field('price', __('Price'));
        $show->field('images', __('Images'));
        $show->field('duration', __('Duration'));
        $show->field('include', __('Include'));
        $show->field('exclude', __('Exclude'));
        $show->field('notes', __('Notes'));
        $show->field('map', __('Map'));
        $show->field('stars', __('Stars'));
        $show->field('new', __('New'));
        $show->field('active',__('Active'));
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
        $form = new Form(new OutTour());

        $form->select('out_id', __('Out id'))->options(Out::where('main_id',null)->pluck('name','id'));
        $form->select('main_id', __('Main Id'))->options(\App\OutTour::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('name', __('Name'));
        $form->ckeditor('desc', __('Desc'));
        $form->number('price', __('Price'));
        $form->multipleImage('images', __('Images'))->move('uploads/images/tours/outgoing')->removable();
        $form->text('duration', __('Duration'));
        $form->ckeditor('include', __('Include'));
        $form->ckeditor('exclude', __('Exclude'));
        $form->ckeditor('notes', __('Notes'));        
        $form->number('stars', __('Stars'))->min(1);
        $form->switch('active', __('Active'))->default(true);
        $form->switch('new', __('New'))->default(true);
        $form->text('map',__('Map'));

        return $form;
    }
}
