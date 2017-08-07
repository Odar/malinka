/**
 * Created by toools on 05.08.2017.
 */
var togle = 0;

var Search = {
    params : Array("",""),
    __Go : function(){
        $("#search_go").attr('href','/search?phason='+this.params[0]+'&price='+this.params[1]);
    }

};
function remove_cook_my(){
    var aww = arguments[0];
    var obj = arguments[1];
    var del;
    var dataFilter=$.cookie('id_malinka2'); // аПаОаЛббаАаЕаМ баОббаАаНаЕаНаНбаЕ баАаНаЕаЕ аНаАбббаОаЙаКаИ
    var filter = eval(dataFilter);
    if(!(filter==null))
    {
        for(var i = 0; i < filter.length;i++)
        {
            if(filter[i]==aww)
            {
                del = i;
            }
        }
        filter.splice(del,1);
    }
    filter=JSON.stringify(filter);//аКаОаНаВаЕббаИбаОаВаАаНаИаЕ аВ бббаОаКб
    $.cookie('id_malinka2',filter );//аЗаАаПаИбб аВ аКбаКаИ

    obj.parents(".cook_master").slideUp();
}

function set_cook_my()
{
    var aww = arguments[0];
    var src = arguments[1];
    var title = arguments[2];
    var flag_exists = 0;
    var dataFilter=$.cookie('id_malinka2'); // аПаОаЛббаАаЕаМ баОббаАаНаЕаНаНбаЕ баАаНаЕаЕ аНаАбббаОаЙаКаИ
    var filter = eval(dataFilter);


    if(!(filter==null))
    {
        for(var j = 0; j < filter.length;j++)
        {
            if(filter[j]==aww)
            {flag_exists=1;}
        }
        filter[filter.length] = aww;
    }
    else
    {
        filter = [];
        filter[0] = aww;

    }
    if(!flag_exists){
        filter=JSON.stringify(filter);//аКаОаНаВаЕббаИбаОаВаАаНаИаЕ аВ бббаОаКб
        $.cookie('id_malinka2',filter );//аЗаАаПаИбб аВ аКбаКаИ

        var html = $(".super_papa").html();
        html += "<div class='cook_master' align='center' style='padding-top:15px'><img width='200px' style='margin-bottom:-6px'  src='/themes/garland/images/right.png' /><div align='center'><div style='width:190px;background-color:rgba(254,210,161,0.5);padding-top:10px;cursor:pointer'><div style='width:180px;' onClick='window.location.href =\"/platia?id="+aww+"\"'><img width='150px' src='"+src+"' ></div><div style='width:180px;' onClick='window.location.href =\"/platia?id="+aww+"\"'><span style='font-family:klementina;color:#f68b1f;font-size:15pt;font-weight: bold'>"+title+"</span></div><div style='border-top:1px solid #f68b1f;width:150px' onclick='remove_cook_my(\""+aww+"\",$(this));'><span style='color:#f58566;font-family:helreg;font-size:10pt'>баБбаАбб</span></div></div><img width='200px' src='/themes/garland/images/right.png' style='-webkit-transform: rotate(180deg);-moz-transform: rotate(180deg);-o-transform: rotate(180deg);filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5);-ms-transform: rotate(180deg);' /></div></div>";
        $(".super_papa").html(html);
    }
}

function resize_wind_zoom()
{
    $("#changer_20").css("width",$(".zoomPad").css('width'));
    $("#changer_20").css("height",$(".zoomPad").css('height'));

}

$(document).ready(function() {
    $(".jqzoom").jqzoom({
        zoomType : 'innerzoom',
        lens : true,
        preloadImages : true,
        alwaysOn : false,
        zoomWidth : 250,
        zoomHeight: 250,
        showEffect:'fadein',
        hideEffect:'fadeout',
        position: 'right',
        imageOpacity: 0.4
    })
    $(".jqzoom2").jqzoom({
        zoomType : 'innerzoom',
        lens : true,
        preloadImages : true,
        alwaysOn : false,
        zoomWidth : 250,
        zoomHeight: 250,
        showEffect:'fadein',
        hideEffect:'fadeout',
        position: 'right',
        imageOpacity: 0.4
    })
    $(".jqzoom2").css("display","none");
});
$(window).load(function () {


    $("#changer_20").css("width",$(".zoomPad").css('width'));
    $("#changer_20").css("height",$(".zoomPad").css('height'));
    if(document.body.clientWidth>=1280)
    {

        $("#container").css("max-width","1280px");
        $("#head_abs").attr("width","1280px");

        $("#head_abs_main").attr("width","900px");
        $("#head_div_main").css("top","380px");

        //$("#changer_2").css("width","265px");
        $("#changer_3").css("width","750px");
        $("#changer_4").css("width","265px");
        //$("#changer_2").css("padding-top","315px");
        //$("#changer_4").css("padding-top","130px");
        $("#changer_5").attr("width","230px");
        $("#changer_6").css("width","230px");
        $("#changer_7").attr("width","230px");
        $("#changer_8").css("margin-top","-53px");
        $("#changer_9").attr("width","230px");
        $("#changer_10").css("margin-top","-36px");
        $("#changer_11").css("width","155px");
        $("#changer_12").attr("width","230px");
        $("#changer_13").attr("width","230px");
        $("#changer_14").css("margin-top","-34px");
        $("#changer_15").css("padding-top","135px");
        $("#changer_16").css("padding-top","100px");
        $("#changer_17").css("min-height","1036px");
        $(".left-corner").css("padding-top","500px");
        $("#changer_19").attr("width","749px");



        $("#changer_22").css("width","376px");



        //$("#changer_30").css("padding-top","545px");
        $("#changer_31").css("padding-top","300px");
        $("#changer_30").css("width","265px");
        $("#changer_34").css("margin-top","-34px");
        $("#changer_37").css("width","230px");
        $("#changer_36").css("margin-top","-36px");
        $("#changer_38").attr("width","230px");

        $("#center_main").css("width","1280px");
    }

    var a = ((document.body.clientWidth)/2)-($("#head_abs").width()/2);

    $("#head_div").css('left',a+"px");
    $("#center_main").css('left',a+"px");
    var h = $("#changer_3").css("height");
    $("#center_main").css('height',h);

    var b = ((document.body.clientWidth)/2)-($("#head_abs_main").width()/2);

    $("#head_div_main").css('left',b+"px");

    var r = document.body.clientWidth - a - 15;
    var l = a - 600 + 15;
    var now = a +15;
    $("#top-left").css('left',l+'px');
    $("#top-right").css('left',r+'px');
    $("#top-right").css('width',now+'px');

    $("#center_main").animate({'opacity':1},100);
    $("#head_div").animate({'opacity':1},100);
    $("#top-left").animate({'opacity':1},100);
    $("#top-right").animate({'opacity':1},100);




});

$(window).resize(function(){

    var a = ((document.body.clientWidth)/2)-($("#head_abs").width()/2);

    $("#head_div").css('left',a+"px");
    $("#center_main").css('left',a+"px");
    var b = ((document.body.clientWidth)/2)-($("#head_abs_main").width()/2);

    $("#head_div_main").css('left',b+"px");

    var l = a - 600 + 15;
    var r = document.body.clientWidth - a - 15;
    var now = a +15;
    $("#top-left").css('left',l+'px');
    $("#top-right").css('left',r+'px');
    $("#top-right").css('width',now+'px');
});

$(function(){
    $("#changer_7").click(function(){
        if(togle == 1)
        {$("#obertka").slideDown();togle=0;}
        else
        {$("#obertka").slideUp();togle=1;}
    });
    $("#changer_8").click(function(){
        if(togle == 1)
        {$("#obertka").slideDown();togle=0;}
        else
        {$("#obertka").slideUp();togle=1;}
    });
});

