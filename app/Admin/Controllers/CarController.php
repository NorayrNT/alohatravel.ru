<?php

namespace App\Admin\Controllers;

use App\Car;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CarController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Car';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Car());

        $grid->fixColumns(0,-1);
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('type', __('Type'));
        $grid->column('trans', __('Transmission'));
        $grid->column('doors', __('Doors'));
        $grid->column('seats', __('Seats'));
        $grid->column('motor', __('Motor'));
        $grid->column('boots',__("Boots"));
        $grid->column('chars', __('Chars'))->limit(25);
        $grid->column('d2',__('D2'));
        $grid->column('d4', __('D4'));
        $grid->column('d7', __('D7'));
        $grid->column('d12', __('D12'));
        $grid->column('d30', __('D30'));
        $grid->images('images')->width(200);

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
        $show = new Show(Car::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('type', __('Type'));
        $show->field('trans', __('Transmission'));
        $show->field('doors', __('Doors'));
        $show->field('seats', __('Seats'));
        $show->field('motor', __('Motor'));
        $show->field('boots', __('Boots'));
        $show->field('chars', __('Chars'));
        $show->field('d2', __('D2'));
        $show->field('d4', __('D4'));
        $show->field('d7', __('D7'));
        $show->field('d12', __('D12'));
        $show->field('d30', __('D30'));
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
        $form = new Form(new Car());

        $form->select('main_id', __('Main Id'))->options(\App\Car::where('main_id',null)->pluck('name','id'));
        $form->select('lang_id', __('Lang Id'))->options(\App\Locale::pluck('title','id'));
        $form->text('name', __('Name'));
        $form->select('type', __('Type'))->options(['coupe'=>"coupe",'sedan'=>'sedan','suv'=>'suv','hatchback'=>'hatchback']);
        $form->select('trans', __('Transmission'))->options(['automatic'=>'automatic','mechanical'=>'mechanical','tiptronic'=>'tiptronic']);
        $form->select('doors', __('Doors'))->options(['2'=>'2','4'=>'4','3'=>'3','5'=>'5']);
        $form->select('seats', __('Seats'))->options(['2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'8']);
        $form->text('motor', __('Motor'));
        $form->text('boots', __('Boots'));
        $form->text('chars', __('Characters'));
        $form->number('d2', __('D2'));
        $form->number('d4', __('D4'));
        $form->number('d7', __('D7'));
        $form->number('d12', __('D12'));
        $form->number('d30', __('D30'));
        $form->multipleImage('images')->move('uploads/images/services/cars')->sortable()->removable();

        return $form;
    }
}
