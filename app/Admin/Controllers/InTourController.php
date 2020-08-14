<?php

namespace App\Admin\Controllers;

use App\InTour;
use App\In;
use App\TourStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InTourController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\InTour';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new InTour());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('in_id', __('In id'));
        $grid->column('main_id','Main Id');
        $grid->column('lang_id','Lang Id');
        $grid->column('name', __('Name'))->limit(20);
        $grid->column('desc', __('Desc'))->limit(20);
        $grid->column('duration',"Duration")->limit(20);
        $grid->column('stars', __('Stars'));
        $grid->column('price', __('Price'));
        $grid->image('images');
        $grid->column('include', __('Include'))->limit(20);
        $grid->column('exclude', __('Exclude'))->limit(20);
        $grid->column('notes', __('Notes'))->limit(20);
        $grid->column('p6',__('p6'));
        $grid->column('p8',__('p8'));
        $grid->column('p10',__('p10'));
        $grid->column('p12',__('p12'));
        $grid->column('p16',__('p16'));
        

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
        $show = new Show(InTour::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('in_id', __('In id'));
        $show->field('main_id', __('Main Id'));
        $show->field('lang_id', __('Lang Id'));
        $show->field('name', __('Name'));
        $show->field('desc', __('Desc'));
        $show->field('stars', __('Stars'));    
        $show->field('price', __('Price'));    
        $show->field('images', __('Images'));
        $show->field('include', __('Include'));
        $show->field('exclude', __('Exclude'));
        $show->field('p6', __('p6'));
        $show->field('p8', __('p8'));
        $show->field('p10', __('p10'));
        $show->field('p12', __('p12'));
        $show->field('p16', __('p16'));
        $show->field('notes', __('Notes'));
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
        $form = new Form(new InTour());

        $form->select('main_id', __('Main Id'))->options(\App\InTour::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->select('in_id', __('In id'))->options(In::where('main_id',null)->pluck('name','id'));
        $form->text('name', __('Name'));
        $form->ckeditor('desc', __('Desc'));
        $form->select('status_id','Status Id')->options(TourStatus::where('main_id',null)->pluck('title','id'));
        $form->text('duration','Duration');
        $form->number('stars','Stars');
        $form->number('price','Price');
        $form->text('map','Map');
        $form->ckeditor('include', __('Include'));
        $form->ckeditor('exclude', __('Exclude'));
        $form->ckeditor('notes', __('Notes'));
        // $form->switch('top')->default(0);
        $form->number('p6',__('p6'));
        $form->number('p8',__('p8'));
        $form->number('p10',__('p10'));
        $form->number('p12',__('p12'));
        $form->number('p16',__('p16'));
        $form->image('images', __('Images'))->move('uploads/images/tours/incoming')->removable();

        return $form;
    }
}
