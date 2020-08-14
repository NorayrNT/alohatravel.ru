<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());
        
        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'))->limit(10);
        $grid->column('email', __('Email'))->limit(10);
        $grid->column('email_verified_at', __('Email verified at'))->limit(10);
        $grid->column('password', __('Password'))->limit(10);
        $grid->column('gender', __('Gender'));
        $grid->column('image', __('Image'))->limit(10);
        $grid->column('anonym', __('Anonym'));
        $grid->column('anonym_user', __('Anonym user'));
        $grid->column('remember_token', __('Remember token'))->limit(10);
        // $grid->column('created_at', __('Created at'))->limit(10);
        // $grid->column('updated_at', __('Updated at'))->limit(10);

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('gender', __('Gender'));
        $show->field('image', __('Image'));
        $show->field('anonym', __('Anonym'));
        $show->field('anonym_user', __('Anonym user'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->select('gender', __('Gender'))->options([1 => 'male',2 => 'female']);
        $form->image('image', __('Image'))->move('uploads/images/users/')->removable();
        $form->switch('anonym', __('Anonym'));
        $form->switch('anonym_user', __('Anonym user'));
        // $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
