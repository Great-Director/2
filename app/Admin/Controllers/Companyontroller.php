<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class Companyontroller extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '甲方单位';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company);

        $grid->column('name', __('单位名称'));
        $grid->column('grade', __('Grade'));
        $grid->column('type', __('类型'));
        $grid->column('other', __('其他'));

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
        $show = new Show(Company::findOrFail($id));

        $show->field('name', __('单位名称'));
        $show->field('grade', __('Grade'));
        $show->field('type', __('类型'));
        $show->field('other', __('其他'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Company);
         $form->text('name', __('单位名称'));
        $form->text('grade', __('单位名称'));
        $form->text('type', __('类型'));
        $form->text('other', __('其他'));

        return $form;
    }
}
