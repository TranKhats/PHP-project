<?php
    require_once '../connect.php';
    $admin="kharomts95@gmail.com.vn";
    $id_send=$_COOKIE['user'];
    // --------------get Messager-----------------
    if(isset($_POST['action'])&&$_POST['action']=="getMessager"){
        if(isset($_COOKIE['user'])){
            
            //$message=$_POST['message'];
            //$result=addMessage($id_send,$admin,$message);
            // if($result){
                $messageArr=getConversation($id_send,$admin);
                $html=showMessageArr($messageArr,$id_send);
                echo json_encode($html);
            // }    
        }
    }
    // -----------------send Message-----------------
    if(isset($_POST['action'])&&$_POST['action']=='send'){
        $message=$_POST['message'];
        $html=addMessage($id_send,$admin,$message);
        echo json_encode($html);
    }

    function addMessage($id_sent,$id_receive,$message){
        $conn=connect();
        $html="";
        $time=date('Y-m-d H:i:s');
        $query="INSERT INTO `messager` VALUES ('$message','','$time','$id_sent','$id_receive')";
        $result=$conn->query($query);
        if($result){
                    $html="<div class='row msg_container base_sent'>
                                <div class='col-md-10 col-xs-10 '>
                                    <div class='messages msg_sent'>
                                        <p>$message</p>
                                        <time datetime='2009-11-13T20:00'>$time</time>
                                    </div>
                                </div>
                                <div class='col-md-2 col-xs-2 avatar'>
                                    <img src='images/chat/icon_chat.png'>
                                </div>
                            </div>";
        }
        $conn=null;
        return $html;
    }

    function getConversation($id_send,$id_receive){
        $conn=connect();
        $query="select body,date_added ,id_send,id_receive
                from messager 
                where (id_send='$id_receive' and id_receive='$id_send')
                    or (id_receive='$id_receive' and id_send='$id_send')
                order by date_added
                limit 0,50";
        $result=$conn->query($query);
        $arr=array();
        while($row=$result->fetch_assoc()){
            array_push($arr, $row);
        }
        return $arr;
        $conn=null;
    }

    function getMessage($id_send,$id_receive){
        $conn=connect();
        $query="select body, date_added 
                from messager 
                where (id_send='$id_receive' and id_receive='$id_send')
                    or (id_receive='$id_receive' and id_send='$id_send')
                order by date_added desc
                limit 0,1";
        $conn->query($query);
        $conn=null;
    }

    function showMessageArr($messageArr,$id_send){
        $messageHtml="";
        foreach($messageArr as $item){
            //$userName=explode("@",$item['id_send'])[0];
            $userName=$item['id_send'];
            $name=explode("@",$item['id_send'])[0];
            if(strcmp($userName,$id_send)==0){
                // $messageHtml.="<div class='my-message mes'>
                //                 ".$item['body']."
                //             </div>
                //             <div class='my-icon avartar'>
                //                 <a href='#'>$name</a>
                //             </div>";
                $messageHtml.="<div class='row msg_container base_sent'>
                                <div class='col-md-10 col-xs-10 '>
                                    <div class='messages msg_sent'>
                                        <p>".$item['body']."</p>
                                        <time datetime='2009-11-13T20:00'>".$item['date_added']."</time>
                                    </div>
                                </div>
                                <div class='col-md-2 col-xs-2 avatar'>
                                    <img src='images/chat/icon_chat.png'>
                                </div>
                            </div>";
            }
            else{
                // $messageHtml.="<div class='your-icon avartar'>
                //             <a href='#'>$name</a>
                //         </div>
                //         <div class='your-message mes'>
                //             ".$item['body']."
                //         </div>";
                $messageHtml.="<div class='row msg_container base_receive'>
                                <div class='col-md-2 col-xs-2 avatar'>
                                    <img src='images/chat/icon_chat.png' class=' img-responsive '>
                                </div>
                                <div class='col-xs-10 col-md-10'>
                                    <div class='messages msg_receive'>
                                        <p>".$item['body']."</p>
                                        <time datetime='2009-11-13T20:00'>".$item['date_added']."</time>
                                    </div>
                                </div>
                            </div>";
            }
            
        }
        return $messageHtml;
    }
?>