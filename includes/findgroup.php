<?php
    function find_group($sessionDatas, $strGrp){
        $i = 0;
        $idxGrp = 0;
        foreach($sessionDatas->children() as $group){
            if ($sessionDatas->groupe[$i]->nomgroupe  == $strGrp){
                $idxGrp = $i;
                return $idxGrp;
            }
            $i++;
        }
        return $idxGrp;
    }


