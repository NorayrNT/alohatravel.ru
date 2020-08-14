<?php

namespace App\Admin\Controllers;

use App\SocialLink;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SocialLinksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\SocialLink';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SocialLink());

        $grid->column('id', __('Id'));
        $grid->column('address', __('Address'));
        $grid->column('icon', __('Icon'));
        $grid->image('logo', __('Logo'));

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
        $show = new Show(SocialLink::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('address', __('Address'));
        $show->field('icon', __('Icon'));
        $show->field('logo', __('Logo'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SocialLink());

        $form->text('address', __('Address'));
        $form->text('icon', __('Icon'));
        $form->text('logo', __('Logo'));

        return $form;
    }
}
