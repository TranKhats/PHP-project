var PageCurrent=1;
$(document).ready(function(){
    $('.product img').mouseover(function(e){
        var $this = $(e);
        $('.follower-data').css({'display':'none'})
        $(e.currentTarget.previousElementSibling.previousElementSibling).css({
            left:  e.offsetX,
            top:   e.offsetY,
             'z-index':'7',
             'display':'block'
        })
        $( "#log" ).html( "clicked: " + event.target.nodeName );
        console.log(e.offsetX+' '+e.offsetY);
    });
});
function set_SubmenuPositon(that){
    var top=$(that).position().top;
    $('.sub-menu').css({"top":"top"});
}
function openMenu(){
    $('#navigation').show(400);
}

function showErrRegister(){
    var data={fistname:$('#signature .fist-name').val(),fullname:$('#signature .full-name').val(),
            phone:$('#signature .phone').val(),password:$('#signature .password').val(),
            repass:$('#signature .re-password').val(),username:$('#signature .user-name').val(),
            password:$('#signature .password').val(),
            repass:$('#signature .re-password').val()};
    $.ajax({
        type:"post",
        dataType:"json",
        url:"validate.php",
        data: {signature:data },
        success: function(cars){
            $('#result').html(cars);
        }
    });
}

function loadMore(that){
    PageCurrent++;
    $.ajax({
        type:"post",
        dataType:"text",
        url:"getProducts.php",
        data:{PageCurrent:PageCurrent},
        success:function(array){
            array=JSON.parse(array);
            $("#all-products").append(array[0]);
            if(array[1]){
                $('#load-more').hide();
            }

        }
    });
}

function loadMoreSearch(that){
    PageCurrent++;
    $.ajax({
        type:"post",
        dataType:"text",
        url:"resultSearch.php",
        data:{PageCurrent:PageCurrent},
        success:function(array){
            array=JSON.parse(array);
            $("#all-products").append(array[0]);
            if(array[1]){
                $('#load-more').hide();
            }

        }
    });
}

function addProduct(that){
   var x= $(that).parents();
}
$(document).ready(function(){
    $(".quick_view").click(function(){

    })
});

$(document).ready(function(){
    $('.detail-product-admin').click(function(){
        $('#main-content tr:nth-child(odd)').css({'background':'white'});
        $('#main-content tr:nth-child(even)').css({'background':'#dddddd'});
        $(this).css({'background':'#fbf625'});
        $('.name-product-update').val($(this).find('.name-val').text());
        $('.type-product-update').val($(this).find('.type-val').attr('value'));
        $('.producer-update').val($(this).find('.producer-val').attr('value'));
        $('.amount-update').val($(this).find('.import-val').text());
        $('.id-update').val($(this).find('.id-val').text());
    });
});

$(document).ready(function(){
    $('.change-data').click(function(){
        $('#messageBox').css({"display":"block"});
        // $.ajax({
        //     type:"post",
        //     dataType:"text",
        //     url:"admin.php",
        //     success:function(message){
        //     //$('#messageBox').show(400);
        //         var data=message;
        //         //var x=JSON.parse(message);
        //         var y=5;
        //     }
        // });

        // $.ajax({
        //     type:"post",
        //     dataType:"text",
        //     url:"admistration.php",
        //     success:function(message){
        //         var data=JSON.parse(message)
        //     }
        // });
    });
})

// $(document).ready(function(){
//     $('#search-product').click(function(){
//         var  imfo=$('#search-product').text;
//         $.ajax({
//             type:'post',
//             dataType:'text',
//             url:'searchProduct.php',
//             //data:{info:info},
//             success:function(message){

//             }
//         });
//     });
// });

$(document).ready(function(){
    $('.remove-added').click(function(){
        var id=$(this).parents().attr('data-id');
        $.ajax({
            type:'post',
            dataType:'text',
            url:'showCart.php',
            data:{action:'remove',idRemove:id},
            async:false,
            error:function(){
                alert('Erro,plz try again!');
            }
            
        });
        window.location.reload(true);
    });
});
//---------------MINUS available-------------------------
$(document).ready(function(){
    $('.minus').click(function(){
        var id=$(this).parents('.choose-number').parent().siblings().attr('data-id');
        $.ajax({
            type:'get',
            dataType:'text',
            url:'showCart.php',
            data:{action:'minus',idMinus:id},
            async:false,
            error:function(){
                alert('Error,plz try again!');
            }
        });
        window.location.reload(true);
    });
})
//----------------PLUS available--------------------------------
$(document).ready(function(){
    $('.plus').click(function(){
        var id=$(this).parents('.choose-number').parent().siblings().attr('data-id');
        $.ajax({
            type:'GET',
            dataType:'text',
            url:'showCart.php',
            data:{action:'plus',idPlus:id},
            async:false,
            error:function(){
                alert('Error,plz try again!');
            }
        });
        window.location.reload(true);
    });
});
//------------------------Bill----------------------
// $(document).ready(function(){
//     $("#order").click(function(){
//         $.ajax({
//             type:'GET',
//             dataType:'json',
//             url:'showCart.php',
//             success:function(isordered){
//                 alert('Error,plz try again!');
//             },
//             error:function(isordered){
//                 alert('Error,plz try again!');
//             }
//         });
//     });
// });
// -------------------Send Message----------------
$(document).ready(function(){
    $('#btn-chat').click(function(){
        var value=$('#btn-input').val();
        $.ajax({
            type:'post',
            dataType:'json',
            url:'include/messager.php',
            data:{action:"send",message:value},
            async:false,
            success:function(html){
                $('#messager').append(html);
            },
            error:function(html){
                $('#messager').append('Tin nhắn gởi đi bị lỗi.');
            }
        });
        makeScrolling();
    });
});

// ----------------Make Chat Box Scroll----------------------

function makeScrolling(){
    var height=0;
    $('#messager div').each(function(i,element){
        height+=parseInt($(element).height());
    });
    height+='';
    $('#messager').animate({scrollTop:height});
}
//-----------------Load Messager----------------------
function loadMessager(that){
    $cursor=$('#show-hide').children('span')
    var flag=$cursor.hasClass('glyphicon-minus');
    if(flag){
        $.ajax({
            type:"post",
            dataType:"json",
            url:"include/messager.php",
            data:{action:"getMessager"},
            async:false,
            success:function(html){
                $('#messager').empty();
                $('#messager').append(html);
                
            },
            error:function(html){
                $('#messager').empty();
                $('#messager').append("Tải tin nhắn bị lỗi");
            }
        })
    }
    //$('#messager').animate({top:'0px'});
    makeScrolling();
}
