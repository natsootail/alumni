<?php

function getRate($ml, $jq, $hq, $ud){
	if($ml == 0 && $jq == 0 && $ud ==0 && $hq > 0){
		$result = "HIGHLY QUALIFIED.";
	}
	if($ml == $jq && $jq == $ud && $ud == $hq || $jq >= $hq){
		$result = "QUALIFIED.";
	}
	if($ml > 0 && $jq > 0 && $ud > 0 && $hq > 0){
		if( ($ml >= $jq || $ud >= $jq ) && ( $ml > $hq || $ud > $hq) ){
			$result = "MOST LIKELY QUALIFIED.";
		}
		if($hq > $ml && $hq > $jq && $hq > $ud){
			if($ml == $jq && $jq == $ud || $ml > $jq){
				$result = "MOST LIKELY QUALIFIED.";
			}else if($jq > $ml && $jq > $ud){
				$result = "QUALIFIED.";
			}
		}
	}
	
}


function getRate2($ml = 0, $jq = 0, $hq = 0, $ud = 0){
	if($ml == 0 && $jq == 0 && $hq == 0){
		$result = "UNDEFINED.";
	}else{
		$ml += $ud;
		if($hq > $jq && $hq > $ml){
			$result = "Highly Qualified.";
		}else if( ($jq > $ml && $hq == 0) || ( $ml == $hq && $jq == 0) || ( $jq >= $hq && $ml == 0) || ($hq == $jq && $jq == $ml) ){
			$result = "Qualified.";
		}else if( ($ml >= $jq && $hq == 0) || ( $ml > $hq && $jq == 0)){
			$result = "Most Likely Qualified.";
		}
	}
	return $result;
}
