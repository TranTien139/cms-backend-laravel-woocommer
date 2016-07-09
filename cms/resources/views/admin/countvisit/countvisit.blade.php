@extends("admin.headerfooter.masterpage")
@section("title")
Thống Kế Số Lượt View Website
@stop
@section("content_admin") 
  
  <div class="col-lg-12">
  <h1 class="page-header">Thống Kê Số Lượt View Website</h1>
  </div>
  <!-- /.col-lg-12 -->
  <div class="row">
    <div class="col-sm-7">
    <div class="col-sm-12" style="padding-bottom:120px">

    <div>
      Hôm nay là: <span><?php sw_get_current_weekday() ?> </span>
    </div>
    <?php 
  
  $day = date("d");
  $month = date('m');
  $week = date('w');
  $year = date('y');
  $find =  DB::table('countvisit')->get();
  foreach($find as $row){
      $today = $row->today+1;
      $week1 = $row->week+1;
      $month1 = $row->month+1;
      $year1 = $row->year+1;
      $total = $row->total+1;

      if($day !=  $row->txtday){
        DB::table('countvisit')->where('id',1)->update(
        array('txtday'=>$day, 'today'=>0)
        );
      }
      if($week !=  $row->txtweek){
        DB::table('countvisit')->where('id',1)->update(
        array('txtweek'=>$week, 'week'=>0)
        );
      }
      if($month !=  $row->txtmonth){
        DB::table('countvisit')->where('id',1)->update(
        array('txtmonth'=>$month, 'month'=>0)
        );
      }
      if($year !=  $row->txtyear){
        DB::table('countvisit')->where('id',1)->update(
        array('txtyear'=>$year, 'year'=>0)
        );
      }
    }
?>
    <?php $data =  DB::table('countvisit')->get(); ?>
    @foreach($data as $item)
     <ul>
       <li>
         <ul class="list-inline">
           <li><p>Hôm Nay:</p></li>
           <li><h2>{!! $item->today !!}</h2></li>
         </ul>
       </li>
       <li>
         <ul class="list-inline">
           <li><p>Tuần Này:</p></li>
           <li><h2>{!! $item->week !!}</h2></li>
         </ul>
       </li>
       <li>
         <ul class="list-inline">
           <li><p>Tháng Này:</p></li>
           <li><h2>{!! $item->month !!}</h2></li>
         </ul>
       </li>
       <li>
         <ul class="list-inline">
           <li><p>Năm Này:</p></li>
           <li><h2>{!! $item->year !!}</h2></li>
         </ul>
       </li>
       <li>
         <ul class="list-inline">
           <li><p>Tổng Số:</p></li>
           <li><h2>{!! $item->total !!}</h2></li>
         </ul>
       </li>
     </ul>
     @endforeach
    </div> 
    </div>
     </div>       
@stop
