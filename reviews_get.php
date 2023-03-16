<html>

<body>

Order by rating: <?php echo $_GET["OrderByRating"]; ?><br>
ratingimum rating: <?php echo $_GET["minRating"]; ?><br>
Order by date: <?php echo $_GET["ByDate"]; ?><br>
Prioritize by text: <?php echo $_GET["Priority"]; ?><br>

<?php 

$reviews = json_decode(file_get_contents('reviews.json'), true);


$byDate = $_GET['ByDate'];
if(strcmp($byDate,"OldestFirst")==0){
    function compareDates($date1, $date2){
        $datetime1=strtotime($date1['reviewCreatedOnDate']);
        $datetime2= strtotime($date2['reviewCreatedOnDate']);
        return $datetime1-$datetime2;
    }
    usort($reviews,"compareDates");

    $rating = $_GET['minRating'];
    $pom = $reviews;

    if($rating==2){
        foreach($pom as $key => $val) {
          if($val['rating'] == 1) {
          unset($pom[$key]);
      }
    }}
    if($rating==3){
        foreach($pom as $key => $val) {
          if($val['rating'] == 1 || $val['rating'] == 2) {
          unset($pom[$key]);
      }
    }}
    if($rating==4){
        foreach($pom as $key => $val) {
          if($val['rating'] == 1 || $val['rating'] == 2 || $val['rating'] == 3) {
          unset($pom[$key]);
      }
    }}
    if($rating==5){
        foreach($pom as $key => $val) {
          if($val['rating'] == 1 || $val['rating'] == 2 || $val['rating'] == 3 || $val['rating'] == 4) {
          unset($pom[$key]);
      }
    }}

    $Order=$_GET["OrderByRating"];
	if(strcmp($Order, "HighestFirst")==0){
		$keys1 = array_column($pom, 'rating');
		array_multisort($keys1, SORT_DESC, $pom);
	}else{
		$keys1 = array_column($pom, 'rating');
		array_multisort($keys1, SORT_ASC, $pom);
	}

	$Priority=$_GET["Priority"];
	$arrOne=array();
	$arrTwo=array();
	if(strcmp($Priority,"yes")==0){
		foreach($pom as $key => $val){
			if(strcmp($val['reviewText'], "")){
				$arrOne[$key]=$val;
			}
			else{
				$arrTwo[$key]=$val;
			}
		}
		var_dump($arrOne);
		var_dump($arrTwo);
	}else{
		var_dump($pom);
	}
}else{
	function compareDates($date1, $date2) {
    	$datetime1 = strtotime($date1['reviewCreatedOnDate']);
    	$datetime2 = strtotime($date2['reviewCreatedOnDate']);
    	return $datetime1 >= $datetime2;
	} 
	usort($reviews, 'compareDates');
	
  	$rating=$_GET["minRating"];
  	$pom=$reviews;
  	if($rating==2){
  		foreach($pom as $key => $val) {
    		if($val['rating'] == 1) {
        	unset($pom[$key]);
    	}
  	}}
  	if($rating==3){
  		foreach($pom as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2) {
        	unset($pom[$key]);
    	}
  	}}
  	if($rating==4){
  		foreach($pom as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2 || $val['rating'] == 3) {
        	unset($pom[$key]);
    	}
  	}}
  	if($rating==5){
  		foreach($pom as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2 || $val['rating'] == 3 || $val['rating'] == 4) {
        	unset($pom[$key]);
    	}
  	}}

  	$Order=$_GET["OrderByRating"];
	if(strcmp($Order, "highest")==0){
		$keys1 = array_column($pom, 'rating');
		array_multisort($keys1, SORT_DESC, $pom);
	}else{
		$keys1 = array_column($pom, 'rating');
		array_multisort($keys1, SORT_ASC, $pom);
	}

	$Priority=$_GET["Priority"];
	$arrOne=array();
	$arrTwo=array();
	if(strcmp($Priority,"yes")==0){
		foreach($pom as $key => $val){
			if(strcmp($val['reviewText'], "")){
				$arrOne[$key]=$val;
			}
			else{
				$arrTwo[$key]=$val;
			}
		}
		var_dump($arrOne);
		var_dump($arrTwo);
	}else{
		var_dump($pom);
	}
}

?>

</body>
</html>