/**
 +-------------------------------------------------------------------
 * jQuery FontScroll - 文字行向上滚动插件 - http://java2.sinaapp.com
 +-------------------------------------------------------------------
 * @version    1.0.0 beta
 * @since      2014.06.12
 * @author     kongzhim <kongzhim@163.com> <http://java2.sinaapp.com>
 * @github     http://git.oschina.net/kzm/FontScroll
 +-------------------------------------------------------------------
 */
(function($) {
    $.fn.FontScroll = function(options) {
        var d = { time: 3000, s: 'fontColor', num: 1 }
        var o = $.extend(d, options);
        this.children('ul').addClass('line');
        var _con = $('.line').eq(0);
        var _conH = _con.height(); //滚动总高度
        var _conChildH = _con.children().eq(0).height(); //一次滚动高度
        var _temp = _conChildH; //临时变量
        var _time = d.time; //滚动间隔
        var _s = d.s; //滚动间隔
        _con.clone().insertAfter(_con); //初始化克隆
        //样式控制
        var num = d.num;
        var _p = this.find('li');
        var allNum = _p.length;
        _p.eq(num).addClass(_s);
        var timeID = setInterval(Up, _time);
        this.hover(function() { clearInterval(timeID) }, function() { timeID = setInterval(Up, _time); });
        function Up() {
            _con.animate({ marginTop: '-' + _conChildH });
            //样式控制
            _p.removeClass(_s);
            num += 1;
            _p.eq(num).addClass(_s);
            if (_conH == _conChildH) {
                _con.animate({ marginTop: '-' + _conChildH }, "normal", over);
            } else {
                _conChildH += _temp;
            }
        }
        function over() {
            _con.attr("style", 'margin-top:0');
            _conChildH = _temp;
            num = 1;
            _p.removeClass(_s);
            _p.eq(num).addClass(_s);
        }
    }
})(jQuery);
$(function() {
    $('.announce-wrap').FontScroll({ time: 5000, num: 1 });
});
console.log("\n %c 利熙网络 - 资源分享社 %c https://www.liitk.com \n\n", "color: #fadfa3; background: #030307; padding:5px 0;", "background: #fadfa3; padding:5px 0;");

/*评论框随机一言*/
 $.getJSON("https://api.yum6.cn/yan.php?format=json",function(data){ 
 $("#comment").text(data.text);
 });
 $(function(){
 $("#comment").click(function() {
 $(this).select();
 })
 })

/*全站侧边栏锚点美化*/
$(".qq").hover(function () {
	$(this).children(".float-qq-box").show()
},function() {
	$(this).children(".float-qq-box").hide()
});
$(".weixin").hover(function () {
	$(this).children(".float-weixin-box").show()
},function() {
	$(this).children(".float-weixin-box").hide()
});

/*内容页常见问题FQA展开收缩*/
  var ndt = $("#help dt");
  var ndd = $("#help dd");
  ndd.eq(0).show();
  ndt.click(function () {
    ndd.hide();
    $(this).next().show();
  });