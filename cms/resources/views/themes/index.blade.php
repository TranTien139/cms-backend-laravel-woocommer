<!DOCTYPE html>
<html>
<head>
	<title>trang chủ</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="">
</head>
<body>
<?php $data = App\MenuModel::select('id','title','alias','parent_id')->orderBy('order','ASC')->get()->toArray(); ?>
<ul>
	@foreach($data as $values)
		@if($values['parent_id'] == 0)
			<li><a href="{!! url($values['alias']) !!}">{!! $values['title'] !!}</a>
				<?php submenu($data,$values['id']); ?>
			</li>
		@endif
	@endforeach
</ul>

<?php 
	$day = date("d");
	$month = date('m');
	$week = date('w');
	$year = date('y');
	$find =  DB::table('countvisit')->get();
	foreach($find as $row){
		if($day == $row->txtday){
			$today = $row->today+1;
			$week1 = $row->week+1;
			$month1 = $row->month+1;
			$year1 = $row->year+1;
			$total = $row->total+1;
			DB::table('countvisit')->where('id',1)->update(
				array('txtday'=>$day, 'txtweek'=>$week, 'txtmonth'=>$month, 'txtyear'=>$year, 'today'=>$today, 'week'=>$week1, 'month'=>$month1, 'year'=>$year1, 'total'=>$total)
				);
		}else{
			$today = $row->today+1;
			$week1 = $row->week+1;
			$month1 = $row->month+1;
			$year1 = $row->year+1;
			$total = $row->total+1;
			DB::table('countvisit')->where('id',1)->update(
				array('txtday'=>$day, 'today'=>1, 'week'=>$week1, 'month'=>$month1, 'year'=>$year1, 'total'=>$total)
				);
			if($week !=  $row->txtweek){
				DB::table('countvisit')->where('id',1)->update(
				array('txtweek'=>$week, 'week'=>1)
				);
			}
			if($month !=  $row->txtmonth){
				DB::table('countvisit')->where('id',1)->update(
				array('txtmonth'=>$month, 'month'=>1)
				);
			}
			if($year !=  $row->txtyear){
				DB::table('countvisit')->where('id',1)->update(
				array('txtyear'=>$year, 'year'=>1)
				);
			}

		}
	}

?>
</body>
</html>