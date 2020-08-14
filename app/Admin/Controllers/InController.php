<?php

namespace App\Admin\Controllers;

use App\In;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\In';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new In());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('main_id',"Main Id");
        $grid->column('lang_id',"Lang Id");
        $grid->column('name', __('Name'));
        $grid->column('desc',"Desc");
        $grid->column('slug',"Slug");
        $grid->column('seo_title',"Seo Title");
        $grid->column('seo_desc',"Seo Desc")->limit(15);
        $grid->images('images','Images');

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
        $show = new Show(In::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('main_id',"Main Id");
        $show->field('lang_id',"Lang Id");
        $show->field('name', __('Name'));
        $show->field('desc', __('Desc'));
        $show->field('seo_title', __('Seo Title'));
        $show->field('seo_desc', __('Seo Desc'));
        $show->field('slug', __('Slug'));
        // $show->field('images', __('Images'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new In());

        $form->select('main_id', __('Main Id'))->options(\App\In::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('name', __('Name'));
        $form->ckeditor("desc","Desc");
        $form->text("seo_title","Seo Title");
        $form->ckeditor("seo_desc","Seo Desc");
        // $form->text('slug',"Slug");
        $form->multipleImage('images','Images')->move('uploads/images/tours/ins')->removable();

        return $form;
    }
}
