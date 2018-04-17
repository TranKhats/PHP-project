<?php

    function getProductByQuery($querysp,$end){
        $conn=connect();
        $html="";
        $PageCurrent=1;
        define("PAGESIZE",3);
        if(isset($_POST["PageCurrent"])){
            $PageCurrent=$_POST['PageCurrent'];
            $start=($PageCurrent-1)*PAGESIZE;
        }
        else{
            $start=0;
        }
        $querysp.=" limit $start,".PAGESIZE;

        $all="SELECT * FROM SANPHAM";
        //-------------------------------
        if($PageCurrent==(int)($conn->query($all)->num_rows/PAGESIZE+1))
            $end=true;
        //-------------------------------
        
        $resultsp=$conn->query($querysp);
        while($row = $resultsp->fetch_assoc()){
            $productsArr[$row['MASP']]=$row['TENSP'];
        }
        $countProducts=count($productsArr);
        
        


        foreach($productsArr as $key=>$val){
            $query="SELECT CT.MATT,GIATRI FROM SANPHAM S,thongtinchitiet CT
            where S.MASP=CT.MASP  AND S.MASP='$key'";
            $commond_info=$conn->query($query);
            while( $row_detailed = $commond_info->fetch_assoc()){
                $detailed_array[$row_detailed['MATT']] = $row_detailed['GIATRI']; // Inside while loop
            }
            if(isset($detailed_array['ngaynhap'])&&$detailed_array['ngaynhap']>'2016/1/1')
                $type='<span class="type">NEW</span>';
            else {
            $type='';
            }
            if($detailed_array['giacu']>$detailed_array['giamoi']){
            $price= $detailed_array['giacu'];
            }
            else{
                $price= '';
            }
            if(isset($detailed_array['discount'])){
                $discount=$detailed_array['discount']."%";
                $styleDis='';
            }
            else{
                $discount='';
                $styleDis='style="display:none"';
            }
            $html=$html."
                <div class='product' data-id=".$key.">
                    <div class='info'>
                        <span class='discount' ".$styleDis.">".$discount."</span>"
                        .$type.
                    "</div>
                    <img src=".$detailed_array['linkanh'].">
                    <a class='quick_view' href='product.php?id=".$key."'>
                    <i class='fa fa-search-plus' aria-hidden='true'></i>Xem nhanh</a>
                    <a class='add_cart' href='addCart.php?id=".$key."'>
                        <i class='fa fa-shopping-cart' aria-hidden='true'></i> Thêm vào giỏ
                    </a>
                    <div class='detailed_product'>
                    <div class='pr-imfo'>
                        <ul>
                            <li>
                                <i class='fa fa-check-circle' aria-hidden='true'></i> Chip ".$detailed_array['chip']."</li>
                            <li>
                                <i class='fa fa-check-circle' aria-hidden='true'></i> Card ".$detailed_array['card']."</li>
                        </ul>
                    </div>
                    <div class='price'>
                        <span class='discount_price'>".$price."</span>
                        <span class='final_price'>".$detailed_array['giamoi']."</spandiv>
                        <span class='star'>
                            <i class='fa fa-star' aria-hidden='true'></i>
                        </span>

                    </div>
                    <div class='name_product'>
                        <a href='#'>".$val."</a>
                    </div>
                </div>
                </div>";
            $detailed_array=array();
        } 
        if($PageCurrent>1){
            $array=array($html,$end);
            echo json_encode($array);
            //echo json_encode($html);
        }
        else{
            
            echo $html;
        }              
    }

?>