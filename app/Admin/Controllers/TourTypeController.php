<?php

namespace App\Admin\Controllers;

use App\TourType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TourTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TourType';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TourType());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('main_id', __('Main id'));
        $grid->column('lang_id', __('Lang id'));
        $grid->column('desc', __('Desc'))->limit(10);
        $grid->column('url','Url');
        $grid->image('images', __('Image'));

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
        $show = new Show(TourType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('main_id', __('Main id'));
        $show->field('lang_id', __('Lang id'));
        $show->field('desc', __('Desc'));
        $show->field('url',__('Url'));
        $show->field('images', __('Images'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TourType());

        $form->text('title', __('Title'));
        $form->select('main_id', __('Main Id'))->options(\App\TourType::where('main_id',null)->pluck('title','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->textarea('desc', __('Desc'));
        $form->image('images', __('Images'))->move('uploads/images/tourtypes')->removable();
        $form->text('url',"Url");

        return $form;
    }
}
