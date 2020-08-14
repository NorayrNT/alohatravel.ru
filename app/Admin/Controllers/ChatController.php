<?php

namespace App\Admin\Controllers;

use App\Chat;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ChatController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Chat';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Chat());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('sent_id', __('Sent id'));
        $grid->column('receive_id', __('Receive id'));
        $grid->column('sms', __('Sms'))->limit(50);
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
        $show = new Show(Chat::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('sent_id', __('Sent id'));
        $show->field('receive_id', __('Receive id'));
        $show->field('sms', __('Sms'));
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
        $form = new Form(new Chat());

        // $form->number('sent_id', __('Sent id'));
        // $form->number('receive_id', __('Receive id'));
        $form->textarea('sms', __('Sms'));

        return $form;
    }
}
