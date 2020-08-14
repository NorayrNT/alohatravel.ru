<?php

namespace App\Admin\Controllers;

use App\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PagesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Page';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('main_id', __('Main id'));
        $grid->column('lang_id', __('Lang id'));
        $grid->column('title', __('Title'));
        $grid->column('ads', __('Ads'));
        $grid->column('desc', __('Desc'))->limit(20);
        $grid->column('seo_title',__('Seo Title'))->limit(20);
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
        $show = new Show(Page::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('main_id', __('Main id'));
        $show->field('lang_id', __('Lang id'));
        $show->field('title', __('Title'));
        $show->field('ads', __('Ads'));
        $show->field('desc', __('Desc'));
        $show->field('seo_title', __('Seo Title'));
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
        $form = new Form(new Page());

        $form->select('main_id', __('Main Id'))->options(\App\Page::where('main_id',null)->pluck('title','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('title', __('Title'));
        $form->switch('ads', __('Ads'))->default(false);
        $form->ckeditor('desc', __('Desc'));
        $form->text('seo_title', __('Seo Title'));

        return $form;
    }
}
