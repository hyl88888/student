<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
//等待dom元素加载完毕.
$(document).ready(function(){
	$(".level1 > a").click(function(){
		$(this).addClass("current")   //给当前元素添加"current"样式
		.next().show()                //下一个元素显示
		.parent().siblings().children("a").removeClass("current")        //父元素的兄弟元素的子元素<a>移除"current"样式
		.next().hide();                //它们的下一个元素隐藏
		//找到a得到父元素<li>，获取其在兄弟元素中的序号，保存到cookie中，跳转到其他页面后，在读取这个cookie，就知道是哪个<li>下面的菜单处于打开状态
		// console.log($(this).parent().index());
		document.cookie="menuState="+$(this).parent().index();
		return false;
	});
});
//读取菜单状态cookie
//用正则表达式
var menuState = getCookie("menuState");
$(".box .menu>li").eq(menuState).find("ul").show();
function getCookie(name){
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
}

/*var menuNum = document.cookie.substr(-1,1);
//找到对应序号的li,再查找li中的UL标签，让其显示。
$(".box .menu>li").eq(menuNum).find("ul").show();
//找到对应序号的li，在查找li中的第一个超链接
console.log(document.cookie);*/
</script>