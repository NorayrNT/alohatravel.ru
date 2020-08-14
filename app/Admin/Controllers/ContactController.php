<?php

namespace App\Admin\Controllers;

use App\Contact;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContactController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Contact';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Contact());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('cnt', __('Country'))->limit(15);
        $grid->column('addr', __('Address'))->limit(10);
        $grid->column('phone', __('Phone'))->limit(15);
        $grid->column('email', __('Email'))->limit(10);
        // $grid->column('map', __('Map'))->limit(10);

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
        $show = new Show(Contact::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cnt', __('Country'));
        $show->field('addr', __('Address'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('map', __('Map'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Contact());

        $form->select('main_id', __('Main Id'))->options(\App\Contact::where('main_id',null)->pluck('cnt','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('cnt', __('Country'));
        $form->text('addr', __('Address'));
        $form->text('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->text('map', __('Map'));

        return $form;
    }
}
