<?php

namespace App\Admin\Controllers;

use App\TourStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TourStatusesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\TourStatus';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TourStatus());

        $grid->column('id', __('Id'));
        $grid->column('main_id', __('Main id'));
        $grid->column('lang_id', __('Lang id'));
        $grid->column('title', __('Title'));

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
        $show = new Show(TourStatus::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('main_id', __('Main id'));
        $show->field('lang_id', __('Lang id'));
        $show->field('title', __('Title'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TourStatus());

        $form->select('main_id', __('Main Id'))->options(\App\TourStatus::where('main_id',null)->pluck('title','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('title', __('Title'));

        return $form;
    }
}
