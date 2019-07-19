<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use Encore\Admin\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Illuminate\Database\Eloquent\Builder;

class Projectanalysis extends Controller
{
    public function index(Content $content)
    {
          // 选填
    $content->header('项目分析');

    // 选填
    $content->description('图表');

       $content->row(function(Row $row){
        $por_type=DB::table('project')->select(DB::raw('count(por_type) as count, por_type'))
            ->groupBy('por_type')->get()->pluck('count', 'por_type')->toArray();
       $doughnut = view('admin.chart.por_type',compact('por_type'));
       $doughnut=new Box('项目类型',$doughnut);
        $row->column(4,$doughnut);
       });
     return $content;
}
    }
