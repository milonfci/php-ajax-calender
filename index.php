<b>Select your aspected month and year</b><br><br>
<script type="text/javascript" src="formload.js"></script>
<script type="text/javascript">
function view_cal(){
    Apost_office_one='load_cal';//div name
    var text_value="?";
        text_value +="month" +"="+ document.getElementById('month').value + "&";
        text_value +="year" +"="+ document.getElementById('year').value + "&";
    var url="load_cal.php";
    makeRequest(url, text_value);
}
</script>
<select id="month" onchange="view_cal()">
    <option value="0">Select Month</option>
    <option value="1">January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">Ocotber</option>
    <option value="11">November</option>
    <option value="12">December</option>
</select>
<select id="year" onchange="view_cal()">
    <option value="0">Select Year</option>
    <?php
    for($i=2050;$i>=1950;$i--){
        $selected=$i==date("Y")?"selected":'';
        echo "<option $selected>$i</option>";
        unset($selected);
    }
    ?>
</select>

<div id="load_cal" style="margin-top: 5px;">
<style type="text/css">
    *{
        font-family: arial;
        font-size: 13px;
    }
    span#box{
        width: 25px;
        height: 20px;
        border: 1px #D0D0D0 solid;
        padding: 5px 3px ;
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
$day=date('d',$mktime);
$month=date('m',$mktime);
$year=date('Y',$mktime);
echo "<b>".date("F - Y")."</b>";
$total_days_in_month=cal_days_in_month(CAL_GREGORIAN, $month, $year);

$jd = gregoriantojd($month,1,$year);
echo '<pre>';
$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
//print_r($gregorian);
echo '</pre>';

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
if($i==$day){
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
    elseif($dayname=='Thrusday'){
        return 6;
    }
    elseif($dayname=='Friday'){
        return 7;
    }
}
?>   
</div>
