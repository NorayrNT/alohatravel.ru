<?php

namespace App\Admin\Controllers;

use App\Individual;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IndividualController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Individual';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Individual());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'))->limit(12);
        $grid->column('desc', __('Desc'))->limit(12);
        $grid->column('wt3', __('Wt3'));
        $grid->column('wt7', __('Wt7'));
        $grid->column('wt18', __('Wt18'));
        $grid->column('w3', __('W3'));
        $grid->column('w7', __('W7'));
        $grid->column('w18', __('W18'));
        $grid->images();
        $grid->column('km', __('Km'));
        $grid->column('duration', __('Duration'))->limit(15);
        $grid->column('active', __('Active'));

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
        $show = new Show(Individual::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('desc', __('Desc'));
        $show->field('wt3', __('Wt3'));
        $show->field('wt7', __('Wt7'));
        $show->field('wt18', __('Wt18'));
        $show->field('w3', __('W3'));
        $show->field('w7', __('W7'));
        $show->field('w18', __('W18'));
        $show->field('images', __('Images'));
        $show->field('km', __('Km'));
        $show->field('duration', __('Duration'));
        $show->field('active', __('Active'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Individual());

        $form->select('main_id', __('Main Id'))->options(\App\Individual::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('name', __('Name'));
        $form->ckeditor('desc', __('Desc'));
        $form->number('wt3', __('Wt3'));
        $form->number('wt7', __('Wt7'));
        $form->number('wt18', __('Wt18'));
        $form->number('w3', __('W3'));
        $form->number('w7', __('W7'));
        $form->number('w18', __('W18'));
        $form->multipleImage('images', __('Images'))->move('uploads/images/tours/private')->removable();
        $form->text('km', __('Km'));
        $form->text('duration', __('Duration'));
        $form->switch('active', __('Active'))->default(true);

        return $form;
    }
}
