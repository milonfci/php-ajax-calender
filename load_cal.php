<style type="text/css">
    *{
        font-family: arial;
        font-size: 13px;
    }
    span#box{
        width: 25px;
        height: 25px;
        border: 1px #D0D0D0 solid;
        padding: 3px ;
        float: left;
        text-align: center;
    }   
    .test{
        float: left;
        width: 100%;
    }
</style>
<?php
$mktime=mktime(date('h')+6,date('i'),date('s'));
$c_day=date('d');
$c_month=date('m');
$c_year=date('Y');
$month=$_GET['month'];
$year=$_GET['year'];
if($month==0||$year==0){
$mktime=mktime(date('h')+6,date('i'),date('s'));
$month=date('m',$mktime);
$year=date('Y',$mktime);   
echo "<span style='color:red;font-weight:bold;font-size:14px;'>You didn't select correct Month and Year, so viewing Current Month</span>";
}
else{
$month=$_GET['month'];
$year=$_GET['year'];
}
$total_days_in_month=cal_days_in_month(CAL_GREGORIAN, $month, $year);

$jd = gregoriantojd($month,1,$year);
//echo '<pre>';
$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
//print_r($gregorian);
//echo '</pre>';
echo $gregorian['monthname'].' - '.$year;
$week=array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
echo "<div class='test'>";
foreach($week as $value){
    echo "<span id='box'>$value</span>";
}
echo "</div>";
$b=getDayNo($gregorian['dayname'])-1;

for($i=1;$i<=$b;$i++){
    echo "<span id='box'></span>";
}

for($i=1;$i<=$total_days_in_month;$i++,$b++){
if($b%7==0){
    $cl='clear:both;';
}
else{
    $cl='';
}
if($year==$c_year&&$month==$c_month&&$i==$c_day){
   $active='background-color:darkseagreen;color:white;font-weight:bold;' ;
}
    ?>
<span id="box" style="<?php echo $cl;echo $active;?>"><?php echo $i;?></span>
<?php
unset($active);
}
?>






<?php
function getDayNo($dayname){
    if($dayname=='Saturday'){
        return 1;
    }
    elseif($dayname=='Sunday'){
        return 2;
    }
    elseif($dayname=='Monday'){
        return 3;
    }
    elseif($dayname=='Tuesday'){
        return 4;
    }
    elseif($dayname=='Wednesday'){
        return 5;
    }
    elseif($dayname=='Thursday'){
        return 6;
    }
    elseif($dayname=='Friday'){
        return 7;
    }
}
?>