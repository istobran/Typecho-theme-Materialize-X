//实现图片大小自动适应浏览器大小
$(window).resize(function() {
  $('.billboard').height($(window).height());
});
$(window).trigger('resize');

//图片加载完成后再显示
$(".billboard-container").hide();
$(".blog-title").addClass("easeOuts");
$(".blog-description").addClass("easeOuts");
$(".blog-entrance").addClass("easeOuts");
var bg_image = new Image();
bg_image.src = "http://static.bangz.me/bg01.png";
bg_image.onload = function() {
  $(".circleContainer").remove();
  $('.billboard-background').hide();
  $('.billboard-background').css('background-image', 'url('+bg_image.src+')');
  $('.billboard-background').fadeIn("slow", function() {
    $('.billboard-background-mask').css("opacity", "1");
    $(".billboard-container").fadeIn("slow", function() {
      $(".blog-title").removeClass("easeOuts").addClass('easeIns');
      $(".blog-description").removeClass("easeOuts").addClass('easeIns');
      $(".billboard-text-border-top").css("margin-left", "0");
      $(".billboard-text-border-bottom").css("margin-left", "0");
      setTimeout(function() {
        $(".blog-entrance").removeClass("easeOuts").addClass('easeIns');
        ent.startFloating();
      }, 800);
    });
  });
};

// 箭头轮流放大效果
var ent = {
  entrance_floating_interval : undefined,
  delay_time : 400,

  startFloating : function() {
    $(".billboard-background").removeClass("background-scaled");
    $(".blog-entrance i").css("opacity", "0.5");
    this.entrance_floating_interval = setInterval(function() {    //这里必须要加this, 否则会变成全局变量
      //轮流发光（有待改进）
      $(".blog-entrance i").each(function(index, e) {
        $(this).delay(index*ent.delay_time, "emb").queue("emb", function(next) {    //这里不能用this.delay_time，因为这里的this指的是标签i元素
          $(this).css("opacity", "1");
          next();
        }).dequeue("emb");
        $(this).delay((index+1)*ent.delay_time, "unemb").queue("unemb", function(next) {
          $(this).css("opacity", "0.5");
          next();
        }).dequeue("unemb");
      });
    }, ent.delay_time*4);
  },

  stopFloating : function() {
    clearInterval(this.entrance_floating_interval);
    $(".blog-entrance i").css("opacity", "1");
    $(".billboard-background").addClass("background-scaled");
  }
};

$(".blog-entrance").hover(ent.stopFloating, ent.startFloating);

// 平滑滚动到文章页
$("#link-article").click(function() {
  $(".postlist").css("display", "block");
  $("footer").css("display", "block");
  var pos = $(".postlist").offset().top;
  $("html,body").animate({scrollTop: pos}, 1000).queue(function(next) {
    $(".billboard").remove();
    $("#sidebar").fadeIn(100);
    $(document).scrollTop(0);
    if (!!(window.history && history.pushState)){
      // 支持History API
      var first_page_url = $(".current a")[0].href;
      history.pushState(null, null, first_page_url);
    }
    next();
  });
});

// 文章标题下划线特效
var u_effect = ( function() {     // 这种闭包方法比前面的 json 方法要好用得多
  var flag = true;   // 使用flag防止打断
  var mouseStatus = false;    // 记录鼠标移入移出状态

  var animateBorder = function(object, action) {
    if (action == "show") {     // slideIn
      if (flag) {   // 使用flag防止打断
        flag = false;
        $(object).children(".title-border").css("float", "left");
        $(object).children(".title-border").animate({width: "100%"}, 500, function() {flag=true;checkMouse(object, action);});
      }
    } else {    // slideOut
      if (flag) {   // 使用flag防止打断
        flag = false;
        $(object).children(".title-border").css("float", "right");
        $(object).children(".title-border").animate({width: "0%"}, 500, function() {flag=true;checkMouse(object, action);});
      }
    }
  };

  var checkMouse = function(object, currentAction) {
    if (currentAction == "show" && !mouseStatus) {    // 当 当前状态是 show 并且鼠标已经 移出 时
      animateBorder(object, "hide");
    }
    if (currentAction == "hide" && mouseStatus) {   // 当 当前状态是 hide 并且鼠标已经 移入 时
      animateBorder(object, "show");
    }
  };

  return {
    start : function () {
      $(".post-title h1").hover(function() {
        mouseStatus = true;
        animateBorder(this, "show");
      }, function() {
        mouseStatus = false;
        animateBorder(this, "hide");
      });
    }
  };
} ());
u_effect.start();

// 切换侧边栏
$("#menu").click(function() {
  $("#sidebar").toggleClass("sidebar-hide"); // 导航区向右弹出
  $(".postlist").toggleClass("post-full");   // 文章列表区向右收缩
  $("footer").toggleClass("post-full");   // 尾部版权区向右收缩
});

// 添加 Material Design 水波纹点按效果
var ripple_effect = (function() {
  var addRippleEffect = function (e) {
      var target = e.target;
      if (!target.classList.contains("reffect")) return false;
      // 去掉原来选项的选中（active）状态（class），并选中现在的选项
      if (!target.parentNode.classList.contains("active")) {
        $(".active").removeClass("active");
        $(target.parentNode).addClass("active");
      }
      var rect = target.getBoundingClientRect();
      var ripple = target.querySelector('.ripple');
      if (!ripple) {
          ripple = document.createElement('span');
          ripple.className = 'ripple';
          ripple.style.height = ripple.style.width = Math.max(rect.width, rect.height) + 'px';
          target.appendChild(ripple);
      }
      ripple.classList.remove('show');
      var top = e.pageY - rect.top - ripple.offsetHeight / 2 - document.body.scrollTop;
      var left = e.pageX - rect.left - ripple.offsetWidth / 2 - document.body.scrollLeft;
      ripple.style.top = top + 'px';
      ripple.style.left = left + 'px';
      ripple.classList.add('show');
      return false;
  };

  return {
    start : function() {
      document.addEventListener('click', addRippleEffect, false);
    }
  };
}());
ripple_effect.start();

// 暂时禁用 pjax，因为存在一些无法解决问题
// $(document).ready(function(){
//     $.pjax({
//         selector: "a[href^='http://bangz.me']",
//         container: '#pjax-container', //内容替换的容器
//         show: 'slide',  //展现的动画，支持默认和fade, 可以自定义动画方式，这里为自定义的function即可。
//         cache: false,  //是否使用缓存
//         storage: true,  //是否使用本地存储
//     });
//     $(document).on('pjax:complete', function() {
//       u_effect.start();
//     });
// });
