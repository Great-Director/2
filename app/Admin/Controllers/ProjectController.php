<?php

namespace App\Admin\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Database\Eloquent\Builder;
use Encore\Admin\Widgets\Box;
use App\Http\Controllers\Controller;

class ProjectController extends AdminController
{


    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '项目';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Project);


//=======================
//  $grid->footer(function ($query) {
//
//    
//    $sun = $query->where('por_type', '日照')->sum('pro_money');
//     $des = $query->where('por_type', '居住')->sum('pro_money');
//    $date= $query->sum('pro_money');
//
//
//    return "<div style='padding: 10px;'>总收入 ： $date  日照 ： $sun  居住 ： $des</div>";
//});
//========================  

//搜索========================================
        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('pro_name','项目名称');
            $filter->like('company','甲方单位');
            $filter->like('members','项目成员');
            $filter->like('por_type','项目类型');
        });
//==========================================

        $grid->column('peo_name', __('项目负责'))->hide();
        $grid->column('pro_id', __('ID'));
        $grid->column('pro_time', __('签订日期'))->hide();
      
       
        $grid->column('pro_name', __('项目名称'));
        
        $grid->column('por_type', __('项目类型'));
        $grid->column('pro_region', __('项目地区'))->hide();
        $grid->column('pro_intro', __('介绍人'))->hide();
        $grid->column('pro_area', __('面积'));
        $grid->column('pro_money', __('项目金额'))->totalRow();
        $grid->column('pro_num', __('项目编号'));
        $grid->column('pro_state', __('项目状态'));
        $grid->column('des_com', __('设计单位'))->hide();
        $grid->column('company', __('甲方单位'));
        $grid->column('members', __('项目成员'))->hide();
        $grid->column('con_sta', __('合同状态'))->hide();
        $grid->column('propor', __('比例'))->hide();
        $grid->column('invo', __('已开票额'))->totalRow();
        $grid->column('colle', __('已收款'))->totalRow();
        $grid->column('other', __('备注'))->hide();
        $grid->column('sign', __('转签'))->hide();
        $grid->column('veri', __('核查'))->hide();
        $grid->column('reco', __('备案'))->hide();

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
        $show = new Show(Project::findOrFail($id));

        $show->field('peo_name', __('项目负责'));
        $show->field('pro_id', __('ID'));
        $show->field('pro_time', __('签订日期'));
        $show->field('pro_name', __('项目名称'));
        $show->field('por_type', __('项目类型'));
        $show->field('pro_region', __('项目地区'));
        $show->field('pro_intro', __('介绍人'));
        $show->field('pro_area', __('面积'));
        $show->field('pro_money', __('项目金额'));
        $show->field('pro_num', __('项目编号'));
        $show->field('pro_state', __('项目状态'));
        $show->field('des_com', __('设计单位'));
        $show->field('company', __('甲方单位'));
        $show->field('members', __('项目成员'));
        $show->field('con_sta', __('合同状态'));
        $show->field('propor', __('比例'));
        $show->field('invo', __('已开票额'));
        $show->field('colle', __('已收款'));
        $show->field('other', __('备注'));
        $show->field('sign', __('转签'));
        $show->field('veri', __('核查'));
        $show->field('reco', __('备案'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Project);

        $form->text('peo_name', __('项目负责'));
        $form->date('pro_time', __('签订日期'))->default(date('Y-m-d'));
        $form->text('pro_name', __('项目名称'));
        $form->select('por_type', __('项目类型'))->options(['居住'=>'居住','日照'=>'日照','规划'=>'规划','方案'=>'方案','变更'=>'变更','其他'=>'其他']);;
        $form->text('pro_region', __('项目地区'));
        $form->text('pro_intro', __('介绍人'));
        $form->decimal('pro_area', __('面积'));
        $form->decimal('pro_money', __('项目金额'));
        $form->text('pro_num', __('项目编号'));
        $form->select('pro_state',__('项目状态'))->options(['进行中'=>'进行中','已结束'=>'已结束']);
        $form->select('des_com', __('设计单位'))->options(['北京市住宅建筑设计研究院'=>'北京市住宅建筑设计研究院','新疆合筑营造建筑规划设计研究院'=>'新疆合筑营造建筑规划设计研究院']);;
        $name=DB::table('Company')->pluck('name');
        $b=[];
        foreach ($name as $names) {
            $b[$names]=$names;
        }
        $form->select('company', __('甲方单位'))->options($b);
        //$form->text('People.name', __('xingm'));
        //$form->text('members', __('项目成员'));
        //$form->multipleSelect('members', __('项目成员'))->options('People.name');
        $name=DB::table('peoples')->pluck('name');
        $b=[];
        foreach ($name as $names) {
            $b[$names]=$names;
        }
      
        $form->multipleSelect('members', __('项目成员'))->options($b);
        $form->text('con_sta', __('合同状态'));
        $form->text('propor', __('比例'));
        $form->decimal('invo', __('已开票额'));
        $form->decimal('colle', __('已收款'));
        $form->text('other', __('备注'));
        $form->text('sign', __('转签'));
        $form->text('veri', __('核查'));
        $form->text('reco', __('备案'));

        return $form;
    }
}
