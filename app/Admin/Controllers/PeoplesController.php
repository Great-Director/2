<?php

namespace App\Admin\Controllers;

use App\Models\People;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Encore\Admin\Widgets\Box;
class PeoplesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '人员';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        //admin_success('nihoa', 'nihaoaa');
        $grid = new Grid(new People);

//===================合同======================
        $grid -> actions(function($actions){
            $con_time=$actions->row->con_end;  
            $con_time=strtotime($con_time);
            $actions=$actions->row->name;
           if($con_time-time()/86400<15){
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    <strong>".$actions."</strong> 即将到期.
    </div>";
       // admin_warning($actions, '合同即将到期！');
       }

    });
//======================合同end=======================
//====================图表=====================
  
  $grid->header(function ($query) {

    $title = $query->select(DB::raw('count(title) as count, title'))
            ->groupBy('title')->get()->pluck('count', 'title')->toArray();
            
        if(array_key_exists("高级工程师",$title)&&array_key_exists("工程师",$title)&&
            array_key_exists("助理工程师",$title)&&array_key_exists("无",$title)&&
            array_key_exists("会计师",$title)&&array_key_exists("会计从业资格证",$title)&&array_key_exists("人力资源师三级",$title))
        {
    $doughnut = view('admin.chart.title',compact('title'));
    return new Box('职称', $doughnut);}
});
//=======================图标end=========================




        
        $grid->paginate(1000);
//=====================搜索=========================
        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name','姓名');
            $filter->like('major','专业');
            $filter->like('title','职称');
            $filter->like('reg','注册');
        });
        $grid->quickSearch('name','reg','title');
//======================搜索end=========================
        $grid->column('p_id', __('ID'));
        $grid->column('IDD')->display(function () {
            $i=0;
            while($i<100){
                $i++;
            }
    return $i;

});
        $grid->column('name', __('姓名'));
        $grid->column('gender', __('性别'))->hide();
        $grid->column('national', __('民族'))->hide();
        $grid->column('age', __('年龄'))->hide();
        $grid->column('id_card', __('身份证号'))->hide();
        $grid->column('address', __('地址'))->hide();
        $grid->column('edu', __('学历'));
        $grid->column('major', __('专业'));
        $grid->column('collage', __('大学'));
        $grid->column('sta', __('工龄'))->hide();
        $grid->column('degree', __('学位'))->hide();
        $grid->column('title', __('职称'))->label(['高级工程师'=>'primary','工程师'=>'danger','助理工程师'=>'warning','无'=>'default',]);
        $grid->column('title_num', __('职称证号'))->hide();
        $grid->column('title_time', __('职称取得时间'))->hide();
        $grid->column('reg_num1', __('注册章号'))->hide();
        $grid->column('reg', __('注册'));
        $grid->column('reg_num', __('注册证号'))->hide();
        $grid->column('reg_sta', __('注册发证日期'))->hide();
        $grid->column('reg_end', __('注册到期时间'))->hide();
        $grid->column('tel_num', __('电话号'))->hide();
        $grid->column('other', __('其他'))->hide();
        $grid->column('ent_time', __('入职时间'))->hide();
        $grid->column('con_start', __('合同起始'))->hide();
        $grid->column('con_end', __('合同终止'))->hide();
        $grid->column('con_for', __('合同续签终止'))->hide();
        $grid->column('depar', __('部门'))->hide();
        $grid->column('p_com', __('工作单位'))->hide();
        $grid->column('onjob', __('是否在职'))->hide();
        $grid->column('now_num', __('项目数量'))->hide();
        $grid->column('img', __('图片'))->hide();
        
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
        $show = new Show(People::findOrFail($id));

        $show->field('p_id', __('ID'));
        $show->field('name', __('姓名'));
        $show->field('gender', __('性别'));
        $show->field('national', __('民族'));
        $show->field('age', __('年龄'));
        $show->field('id_card', __('身份证号'));
        $show->field('address', __('地址'));
        $show->field('edu', __('学历'));
        $show->field('major', __('专业'));
        $show->field('collage', __('大学'));
        $show->field('sta', __('工龄'));
        $show->field('degree', __('学位'));
        $show->field('title', __('职称'));
        $show->field('title_num', __('职称证号'));
        $show->field('title_time', __('职称取得时间'));
        $show->field('reg_num1', __('注册章号'));
        $show->field('reg', __('注册'));
        $show->field('reg_num', __('注册证号'));
        $show->field('reg_sta', __('注册发证日期'));
        $show->field('reg_end', __('注册到期时间'));
        $show->field('tel_num', __('电话号'));
        $show->field('other', __('其他'));
        $show->field('ent_time', __('入职时间'));
        $show->field('con_start', __('合同起始'));
        $show->field('con_end', __('合同终止'));
        $show->field('con_for', __('合同续签终止'));
        $show->field('depar', __('部门'));
        $show->field('p_com', __('工作单位'));
        $show->field('onjob', __('是否在职'));
        $show->field('now_num', __('项目数量'));
        $show->field('img', __('图片'))->image();
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new People);

        $form->number('p_id', __('ID'));
        $form->text('name', __('姓名'));
        $form->text('gender', __('性别'));
        $form->text('national', __('民族'));
        $form->number('age', __('年龄'));
        $form->text('id_card', __('身份证号'));
        $form->text('address', __('地址'));
        $form->text('edu', __('学历'));
        $form->text('major', __('专业'));
        $form->text('collage', __('大学'));
        $form->date('sta', __('工龄'))->default(date('Y-m-d'));
        $form->text('degree', __('学位'));
        $form->text('title', __('职称'));
        $form->text('title_num', __('职称证号'));
        $form->date('title_time', __('职称取得时间'))->default(date('Y-m-d'));
        $form->text('reg_num1', __('注册章号'));
        $form->text('reg', __('注册'));
        $form->text('reg_num', __('注册证号'));
        $form->date('reg_sta', __('注册发证日期'))->default(date('Y-m-d'));
        $form->date('reg_end', __('注册到期时间'))->default(date('Y-m-d'));
        $form->text('tel_num', __('电话号'));
        $form->text('other', __('其他'));
        $form->date('ent_time', __('入职时间'))->default(date('Y-m-d'));
        $form->date('con_start', __('合同起始'))->default(date('Y-m-d'));
        $form->date('con_end', __('合同终止'))->default(date('Y-m-d'));
        $form->date('con_for', __('合同续签终止'))->default(date('Y-m-d'));
        $form->text('depar', __('部门'));
        $form->text('p_com', __('工作单位'));
        $form->text('onjob', __('是否在职'));
        //$form->number('now_num', __('项目数量'));
        $form->multipleImage('img',__('图片'))->move('/img')->uniqueName()->sortable()->removable();
        return $form;
    }
}
