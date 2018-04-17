<?php

    function findKeyValueProduct($inputStr){
        $searchArr=array();
        $inputArr=explode(' ',$inputStr);//split input into array
        $query="";
        $n=count($inputArr);
        $myfile=fopen('mysearch.txt','r');
        for ($i=0; $i < $n; $i++) { 
            while(!feof($myfile)){
                $line=fgets($myfile,filesize('mysearch.txt'));
                // search thong tin trong tung dong
                if(strpos(strtolower($line),strtolower($inputStr))>0){
                    $end = strpos($line,'>');
                    $key = substr($line,0,$end);
                    $searchArr[$key]=$inputStr;
                }
            }
            $query=makeImfo($searchArr);
        }

        fclose($myfile);
    }

    function makeDetailedImfo($imfoArr){
        $detailedImfo="";
        foreach ($imfoArr as $key => $value) {
            $detailedImfo.="and (TENTT='$key' and GIATRI='$value')";
        }
        return $detailedImfo;
    }

    function makeImfo($imfoArr){
        $imfo="";
        foreach ($imfoArr as $key => $value) {
            $imfo.="and $key='$value'";
        }
        return $imfo;
    }
?>