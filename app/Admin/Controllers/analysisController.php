<?php

namespace App\Admin\Controllers;

use App\Models\People;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;
class analysisController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '人员分析';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new People);
        //==========================
        $grid->filter(function($filter){
        // 去掉默认的id过滤器
         $filter->disableIdFilter();
        });
        $grid->quickSearch('name');
        //==========================
        $grid->disableCreateButton();
        $grid->disablePagination();
       // $grid->column('p_id', __('ID'));
        $grid->column('name', __('姓名'));
        $grid->column('num',__('项目数量'))->display(function(){
       $num=DB::table('project')->where([['members','like','%'.$this->name.'%'],['pro_state','=','进行中']])->get();
       return count($num);
        });

         $grid->column('pro_name',__('项目名称'))->display(function(){
            $pro_name=DB::table('project')->where([['members','like','%'.$this->name.'%'],['pro_state','=','进行中']])->get();
            $i=0;
            $p=[];
            
            while($i<count($pro_name)){
                
                $p[$i]= $pro_name[$i]->pro_name;
                $i++;
            }

           //return implode(",",$p);
            return $p;
        })->badge();

         $grid->actions(function ($actions) {
    $actions->disableDelete();
    $actions->disableEdit();
    $actions->disableView();
});

        //$grid->column('gender', __('Gender'));
        //$grid->column('national', __('National'));
        //$grid->column('age', __('Age'));
        //$grid->column('id_card', __('Id card'));
        //$grid->column('address', __('Address'));
        //$grid->column('edu', __('Edu'));
        //$grid->column('major', __('Major'));
        //$grid->column('collage', __('Collage'));
        //$grid->column('sta', __('Sta'));
        //$grid->column('degree', __('Degree'));
        //$grid->column('title', __('Title'));
        //$grid->column('title_num', __('Title num'));
        //$grid->column('title_time', __('Title time'));
        //$grid->column('reg_num1', __('Reg num1'));
        //$grid->column('reg', __('Reg'));
        //$grid->column('reg_num', __('Reg num'));
        //$grid->column('reg_sta', __('Reg sta'));
        //$grid->column('reg_end', __('Reg end'));
        //$grid->column('tel_num', __('Tel num'));
        //$grid->column('other', __('Other'));
        //$grid->column('ent_time', __('Ent time'));
        //$grid->column('con_start', __('Con start'));
        //$grid->column('con_end', __('Con end'));
        //$grid->column('con_for', __('Con for'));
        //$grid->column('depar', __('Depar'));
        //$grid->column('p_com', __('P com'));
        //$grid->column('onjob', __('Onjob'));
        //$grid->column('now_num', __('Now num'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
  //  protected function detail($id)
  //  {
  //      $show = new Show(People::findOrFail($id));
//
  //      $show->field('p_id', __('P id'));
  //      $show->field('name', __('Name'));
  //      $show->field('gender', __('Gender'));
  //      $show->field('national', __('National'));
  //      $show->field('age', __('Age'));
  //      $show->field('id_card', __('Id card'));
  //      $show->field('address', __('Address'));
  //      $show->field('edu', __('Edu'));
  //      $show->field('major', __('Major'));
  //      $show->field('collage', __('Collage'));
  //      $show->field('sta', __('Sta'));
  //      $show->field('degree', __('Degree'));
  //      $show->field('title', __('Title'));
  //      $show->field('title_num', __('Title num'));
  //      $show->field('title_time', __('Title time'));
  //      $show->field('reg_num1', __('Reg num1'));
  //      $show->field('reg', __('Reg'));
  //      $show->field('reg_num', __('Reg num'));
  //      $show->field('reg_sta', __('Reg sta'));
  //      $show->field('reg_end', __('Reg end'));
  //      $show->field('tel_num', __('Tel num'));
  //      $show->field('other', __('Other'));
  //      $show->field('ent_time', __('Ent time'));
  //      $show->field('con_start', __('Con start'));
  //      $show->field('con_end', __('Con end'));
  //      $show->field('con_for', __('Con for'));
  //      $show->field('depar', __('Depar'));
  //      $show->field('p_com', __('P com'));
  //      $show->field('onjob', __('Onjob'));
  //      $show->field('now_num', __('Now num'));
//
  //      return $show;
  //  }
//
  //  /**
  //   * Make a form builder.
  //   *
  //   * @return Form
  //   */
  //  protected function form()
  //  {
  //      $form = new Form(new People);
//
  //      $form->number('p_id', __('P id'));
  //      $form->text('gender', __('Gender'));
  //      $form->text('national', __('National'));
  //      $form->number('age', __('Age'));
  //      $form->text('id_card', __('Id card'));
  //      $form->text('address', __('Address'));
  //      $form->text('edu', __('Edu'));
  //      $form->text('major', __('Major'));
  //      $form->text('collage', __('Collage'));
  //      $form->date('sta', __('Sta'))->default(date('Y-m-d'));
  //      $form->text('degree', __('Degree'));
  //      $form->text('title', __('Title'));
  //      $form->text('title_num', __('Title num'));
  //      $form->date('title_time', __('Title time'))->default(date('Y-m-d'));
  //      $form->text('reg_num1', __('Reg num1'));
  //      $form->text('reg', __('Reg'));
  //      $form->text('reg_num', __('Reg num'));
  //      $form->date('reg_sta', __('Reg sta'))->default(date('Y-m-d'));
  //      $form->date('reg_end', __('Reg end'))->default(date('Y-m-d'));
  //      $form->text('tel_num', __('Tel num'));
  //      $form->text('other', __('Other'));
  //      $form->date('ent_time', __('Ent time'))->default(date('Y-m-d'));
  //      $form->date('con_start', __('Con start'))->default(date('Y-m-d'));
  //      $form->date('con_end', __('Con end'))->default(date('Y-m-d'));
  //      $form->date('con_for', __('Con for'))->default(date('Y-m-d'));
  //      $form->text('depar', __('Depar'));
  //      $form->text('p_com', __('P com'));
  //      $form->text('onjob', __('Onjob'));
  //      $form->number('now_num', __('Now num'));
//
  //      return $form;
  //  }
}
