 /* ���ڻ���jQueryͼƬƽ���������(2009.04)
 * ��IE6/IE7/Mozilla 5.0��Firefox 3.0.5���в���ͨ��
 * 
 * 
 * �˲��Ҫ��������jQuery v1.2 ����߰汾��
 * �������ʵ��ͼƬƽ�����ϻ��������
 * �������Ҫ�����Ч������ʹ���б��������BUG�����Ը������ڵĲ��������ԣ����ڽ����Լ����Ŭ�����ƴ˲��
 * ������ǰ���ȵ���http://gmarwaha.com/jquery/jcarousellite/ ��������jcarousellite�����
 * ��������ͼƬƽ�������Ĳ���໥����ʹ���Ի�ȡ�����ͼƬЧ��
 * ����ͼƬƽ���������ֻ�Ƕ�jcarousellite����Ĳ���
 * 
 * 
 * ����֧�֣�HTTP://HI.BAIDU.COM/DPXDQX
 * ��Ϊ���ɿ����汾���������ڴ˻���������κι���
 * ���ڽ��������޸Ĺ��İ汾�򷢲���ַ�������ڲ������Թ���Ҳ�����������������ڵ���Ϣ
 * 
 * 
 * �˲��û����jcarousellite����������Ԫ�ص�CSSȫ�Զ����ã�����CSS��ʽ��Ҫ��Ϊ����
 * ԭ��ܼ򵥣�����Ҫ���ǲ����û����������֧��JAVASCRIPT����ع��ܱ�����
 * ����Ҫ������ҳ��Ԫ�ز����ڴ�ʱҲ����ʾ��ȷ����˱�Ҫ��CSS���û���Ҫ���Լ�������
 * 
 * ʹ��ǰ��һ��Ҫ����jQurey�����ű�,��
 *  <script type="text/javascript" src="js/jquery_last.js"></script>
 *  <script type="text/javascript" src="js/YlMarquee.js">
 * ʹ�÷�����
 * 
 * 1��Ϊ��Ҫ���ù����Ķ�������������������class����class="ylMarquee"
 * 2������Ҫ�����Ķ�������<ul></ul>�У������li��ǩ��li��ǩ�п�����ͼƬ�����ֻ��񡭡�
 * 3���˰汾��Ҫ������ÿ��li�б�Ŀ�Ȼ�߶�һ��
 *  <div class="ylMarquee">
 *     <ul>
 *          <li><img src="image/1.jpg" alt="1"></li>
 *          <li><img src="image/2.jpg" alt="2"></li>
 *          <li><img src="image/3.jpg" alt="3"></li>
 *      </ul>
 *  </div>
 * 4������ylMarquee��height��width��ʽ�������Ϲ�����������height�Ĵ�С�����������������width�Ĵ�С������ҳ�潫��ʾ��������
 * 5����ҳ�������jQuery��䣬���ô˲����������ز�����������,�磺
 * <script type="text/javascript">
 * $(document).ready(function(){
 *  $(".stroll").jMarquee({
 *     visible:3,
 *     step:1,
 *     direction:"left"
 *   });
 *});
 * </script>
 * 6�������ز�����
 * visible:ҳ��ɼ�Ԫ�أ�ͼƬ��������Ĭ��Ϊ1�����������
 * step:����������������Ĭ��Ϊ1����������ɼӿ�����ٶȣ���Ϊ0���򲻽��й�����
 * direction:����������"left"�������������"up"�����Ϲ���������������ע������ʱһ��Ҫ��Ӣ�ĵ�˫��("")�Ż�����('')��
 */

(function($) { 
 $.fn.jMarquee = function(o) {
    o = $.extend({
    speed:60,
    step:1,//��������
    direction:"up",//��������
    visible:1//�ɼ�Ԫ������
    }, o || {});
    //��ȡ���������ڸ�Ԫ�������Ϣ
    var i=0;
    var div=$(this);
    var ul=$("ul",div);
    var tli=$("li",ul);
    var liSize=tli.size();
    if(o.direction=="left")
        tli.css("float","left");
    var liWidth=tli.innerWidth();
    var liHeight=tli.height();
    var ulHeight=liHeight*liSize;
    var ulWidth=liWidth*liSize;
  
    //�������Ԫ�ظ�������ָ������ʾԪ������й��������򲻹�����
    if(liSize>o.visible){
        ul.append(tli.slice(0,o.visible).clone())  //����ǰo.visible��li������ӵ�ul�����
        li=$("li",ul);
        liSize=li.size();
        
          //����������������CSS��ʽ
        div.css({"position":"relative",overflow:"hidden"});
        ul.css({"position":"relative",margin:"0",padding:"0","list-style":"none"});
        li.css({margin:"0",padding:"0","position":"relative"});
        
        switch(o.direction){
            case "left":
                div.css("width",(liWidth*o.visible)+"px");
                ul.css("width",(liWidth*liSize)+"px");
                li.css("float","left");
                break;
            case "up":
                div.css({"height":(liHeight*o.visible)+"px"});
                ul.css("height",(liHeight*liSize)+"px");
                break;
        }
        
       
        var MyMar=setInterval(ylMarquee,o.speed);
        ul.hover(
            function(){clearInterval(MyMar);},
            function(){MyMar=setInterval(ylMarquee,o.speed);}
        );
    };
    function ylMarquee(){
         
        if(o.direction=="left"){
            if(div.scrollLeft()>=ulWidth){
                div.scrollLeft(0);
            }
            else
            {
                var leftNum=div.scrollLeft();
                leftNum+=parseInt(o.step);
                div.scrollLeft(leftNum)
            }
        }
        
        if(o.direction=="up"){
            if(div.scrollTop()>=ulHeight){
               div.scrollTop(0);
                
            }
            else{
               var topNum=div.scrollTop();
               topNum+=parseInt(o.step);
               div.scrollTop(topNum);
            }
        }
        
    };
   
}; 
     
})(jQuery);
     
   
     

