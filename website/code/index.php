<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"> 
<title>Academic Galaxy</title>
<script src="https://cdn.staticfile.org/jquery/2.0.0/jquery.min.js">//引用jq
</script>
<script>
//三球同停
$(document).ready(function(){
  $("ball").mouseover(function(){
    $("ball").css("animation-play-state","paused");
  });
  $("ball").mouseout(function(){
    $("ball").css("animation-play-state","running");
  });
});
</script>
<script>
//大球出现
function openNav(x) {
switch(x)
{
    case 1:
        document.getElementById("x1").style.width = "500px";
        document.getElementById("x1").style.height = "500px";
        break;
    case 2:
        document.getElementById("x2").style.width = "500px";
        document.getElementById("x2").style.height = "500px";
        break;
    case 3:
        document.getElementById("x3").style.width = "500px";
        document.getElementById("x3").style.height = "500px";
        break;
}

}

//大球消失
function closeNav(x) {
switch(x)
{
    case 1:
        document.getElementById("x1").style.width = "0";
        document.getElementById("x1").style.height = "0";
        break;
    case 2:
        document.getElementById("x2").style.width = "0";
        document.getElementById("x2").style.height = "0";
        break;
    case 3:
        document.getElementById("x3").style.width = "0";
        document.getElementById("x3").style.height = "0";
        break;
}
}
</script>

<style> 
/*整体背景为黑色*/
body {
	margin: 0;
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	background-image: url(b1.jpg);
  background-size:100% 100%;
}

/*input框美化*/
input{
  width:300px;
  border: 1px solid #ccc; 
  padding: 7px 0px;
  border-radius: 3px;
  padding-left:5px; 
}

/*背景色类*/
s1{background-image: url(title.png); background-size:100% 100%;}
s2{background-image: url(author.png); background-size:100% 100%;}
s3{background-image: url(conference.png); background-size:100% 100%;}
.loader {
    width: 500px;
    height: 500px;
    font-size: 10px;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
}

/*Search engine*/
.loader .sun {
  height: 160px;
  width: 160px;
  background-image: url('earth.png');
  background-size:100% 100%;
  border-radius: 50%;
  box-shadow: 5px 5px 10px #0000a0, -5px -5px 10px #0000a0, 5px -5px 10px #0000a0, -5px 5px 10px #0000a0;
  position: absolute;
  margin: 0;
  transition: width 5s, height 5s;
}

/*title*/
.loader .ball1 {
  left:10px;
  top:210px;
  height: 80px;
  width: 80px;
  line-height: 80px;
  font-size: 32px;
  text-align: center;
  border: 2px solid #555555;
  cursor: pointer;
  background-image: url(title.png);
  background-size:100% 100%;
  border-radius: 50%;
  border-style: hidden;
  position: absolute;
  transform-origin: 240px 40px;
  animation: rotate 10s infinite linear;
  transition: width 5s, height 5s, line-height 5s, font-size 5s;
  -webkit-transform-style:preserve-3d;
}

/*title鼠标悬停变化*/
.loader .ball1:hover {
  width: 100px;
  height: 100px;
  line-height: 100px;
  font-size: 60px;
  transition: width 2s, height 2s, line-height 2s, font-size 2s;
}

/*author*/
.loader .ball2 {
  left:310px;
  top:383px;
  height: 80px;
  width: 80px;
  line-height: 80px;
  font-size: 32px;
  text-align: center;
  border: 2px solid #555555;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  background-image: url(author.png);
  background-size:100% 100%;
  border-radius: 50%;
  border-style: hidden;
  position: absolute;
  transform-origin: -60px -133px;
  animation: rotate 10s infinite linear;
  transition: width 5s, height 5s, line-height 5s, font-size 5s;
  -webkit-transform-style:preserve-3d;
}

/*author鼠标悬停变化*/
.loader .ball2:hover {
  width: 100px;
  height: 100px;
  line-height: 100px;
  font-size: 60px;
  transition: width 2s, height 2s, line-height 2s, font-size 2s;
}

/*conference*/
.loader .ball3 {
  left:310px;
  top:37px;
  height: 80px;
  width: 80px;
  line-height: 80px;
  font-size: 32px;
  border: 2px solid #555555;
  text-align: center;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  background-image: url(conference.png);
  background-size:100% 100%;
  border-radius: 50%;
  border-style: hidden;
  position: absolute;
  transform-origin: -60px 213px;
  animation: rotate 10s infinite linear;
  transition: width 5s, height 5s, line-height 5s, font-size 5s;
  -webkit-transform-style:preserve-3d;
}

/*conference鼠标悬停变化*/
.loader .ball3:hover{
  width: 100px;
  height: 100px;
  line-height: 100px;
  font-size: 60px;
  transition: width 2s, height 2s, line-height 2s, font-size 2s;
}

/*三球圆轨迹*/
.loader .circle {
  height: 400px;
  width: 400px;
  font-size: 32px;
  background-color: transparent;
  border-radius: 50%;
  border-style: solid;
  border-color: gray;
  position: absolute;
  border-width: 1px;
  margin: 0px;
  padding: 0px;
}

/*三球转法*/
@keyframes rotate {
  100% {transform: rotate(-360deg);}
}

/*大球*/
.sidenav {
    height: 0;
    width: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    border-radius: 50%;
    z-index: 1;
    overflow-x: hidden;
    transition: 0.5s;
    text-align:center;
}

/*关闭按钮*/
.sidenav .closebtn {
    position: absolute;
    top: 80px;
    right: 60px;
    font-size: 36px;
    margin-left: 50px;
    color: black;
}

/*提交按钮-1*/
.btn-slide {
    position: relative;
    display: inline-block;
    height: 50px;
    width: 200px;
    line-height: 50px;
    padding: 0;
    border-radius: 50px;
    background: #fdfdfd;
    border: 2px solid black;
    margin: 10px;
    transition: .5s;
}

/*提交按钮-2*/
.btn-slide:hover {
    background-color: black;
}

/*提交按钮-3*/
.btn-slide:hover span.circle {
    right: 100%;
    margin-right: -45px;
    background-color: #fdfdfd;
    color: black;
}

/*提交按钮-4*/
.btn-slide:hover span.title {
    right: 40px;
    opacity: 0;
}

/*提交按钮-5*/
.btn-slide:hover span.title-hover {
    opacity: 1;
    right: 40px;
}

/*提交按钮-6*/
.btn-slide span.circle {
    display: block;
    background-color: black;
    color: #fff;
    position: absolute;
    float: right;
    margin: 5px;
    line-height: 42px;
    height: 40px;
    width: 40px;
    top: 0;
    right: 0;
    transition: .5s;
    border-radius: 50%;
}

/*提交按钮-7*/
.btn-slide span.title, .btn-slide span.title-hover {
    position: absolute;
    right: 90px;
    text-align: center;
    margin: 0 auto;
    font-size: 16px;
    font-weight: bold;
    color: black;
    transition: .5s;
}

/*提交按钮-8*/
.btn-slide span.title-hover {
    right: 80px;
    opacity: 0;
}

/*提交按钮-9*/
.btn-slide span.title-hover {
    color: #fff;
}

/*提交按钮真实提交*/
#sub{width:200px;height:50px;background-color:transparent;border-radius: 50px;border-style: none;}

/*按钮*/
.lanren {
  width: 150px;
  text-align: center;
    line-height: 40px;
    border: 1px solid #CCC;
    border-radius: 2px;
}
.lanren:hover {
  animation: shake 0.82s cubic-bezier(.36, .07, .19, .97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
}
@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }
  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }
  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0);
  }
  40%, 60% {
    transform: translate3d(4px, 0, 0);
  }
}

.book {
  position: absolute;
  top: 80%;
  left: 82%;
  margin-top: -150px;
  width: 240px;
  height: 280px;
  background-color: #fff;
  transform: rotateX(30deg);
}
.preserve-3d {
  /*transform-style属性指定了，该元素的子元素是（看起来）位于三维空间内，还是在该元素所在的平面内被扁平化。*/
  transform-style: preserve-3d;
}
.book-page {
  position: absolute;
  top: 0;
  left: 0;
  width: 240px;
  height: 280px;

  border: 1px solid #1976D2;
  text-align: center;
}
.book-page-box {
  transform-origin: 0 50%;
  transform: rotateY(0deg);
}
@keyframes flipBook1 {
  0% {transform: rotateY(0deg);}
  50% {transform: rotateY(-160deg);}
  80% {transform: rotateY(-160deg);}
  100% {transform: rotateY(0deg);}
}

@keyframes flipBook2 {
  0% {transform: rotateY(0deg);}
  15% {transform: rotateY(0deg);}
  50% {transform: rotateY(-150deg);}
  65% {transform: rotateY(-150deg);}
  100% {transform: rotateY(0deg);}
}

@keyframes flipBook3 {
  0% {transform: rotateY(0deg);}
  30% {transform: rotateY(0deg);}
  50% {transform: rotateY(-140deg);}
  100% {transform: rotateY(0deg);}
}

/*书的封面*/
.book-page-1 .page-front {
  background-color: #1976D2;
}
.book-page-1 .page-back {
  background-image: url(ts.jpg);
  background-size:100% 100%;
}
.book-page-1 .page-front p {
  font-size: 36px;
  color: #fff;
  margin-top: 20px;
}
.flip-animation-1 {
  animation: flipBook1 25s infinite;
}

/*书的第二页*/
.book-page-2 .page-back, .book-page-2 .page-front {
  background-image: url(ts.jpg);
  background-size:100% 100%;

}
.book-page-2 .page-front p {
  font-size: 36px;
  color: #32CD99;
  margin-top: 20px;
}
.flip-animation-2 {
  animation: flipBook2 25s infinite;
}

/*书的第三页*/
.book-page-3 .page-back, .book-page-3 .page-front {
  background-image: url(zjl.jpg);
  background-size:100% 100%;
}
.book-page-3 .page-front p {
  font-size: 36px;
  color: #ff7f00;
  margin-top: 20px;
}
.flip-animation-3 {
  animation: flipBook3 25s infinite;
}

/*书的第四页*/
.book-page-4 .page-back, .book-page-4 .page-front {
  background-image: url(qs.jpg);
  background-size:100% 100%;
}

.book-page-4 .page-front p {
  font-size: 36px;
  color: #FF0066;
  margin-top: 20px;
}
}
</style>
</head>
<body>
  <div style="font-size: 80px; top:10px; position: absolute; text-align: center; color: #9e9ba4;">Academic Galaxy</div>
  <a href="https://www.acemap.info/">
	 <img class="lanren" src="acemap.png" style="position: absolute; margin: -320px -690px;">
  </a>
  <a href="http://www.cs.sjtu.edu.cn/~wang-xb/ieei/index.html">
   <img class="lanren" src="ieee.png" style="position: absolute; margin: -240px -690px;">
  </a>
  <!-- 代码部分begin -->
  <!-- 书的主体 -->
  <div class="book preserve-3d" >
    <!-- 书的最后一页 -->
    <div class="book-page-box book-page-4 preserve-3d">
      <div class="book-page page-front">
        <p>Frontend：</p>
        <p>曲博文</p>
        <p>石润晗</p>
      </div>
    </div>
    <!-- 书的第三页 -->
    <div class="book-page-box book-page-3 preserve-3d flip-animation-3">
      <div class="book-page page-front">
        <p>Visualization：</p>
        <p><br>张嘉乐</p>
      </div>
    </div>
    <!-- 书的第二页 -->
    <div class="book-page-box book-page-2 preserve-3d flip-animation-2">
      <div class="book-page page-front">
        <p>CBO</p>
        <p><br>唐铄</p>
      </div>
    </div>
    <!-- 书的封面 -->
    <div class="book-page-box book-page-1 preserve-3d flip-animation-1">
      <div class="book-page page-front">
        <p><br>
          Our Team
        </p>
      </div>
    </div>
  </div>
  <!-- 代码部分end -->
<div class="loader">
  <!--Search engine-->
  <div class='sun'></div>

  <!--轨道-->
  <div class='circle'></div>

  <!--T-->
  <ball onclick="openNav(1)" class='ball1'><b>T</b></ball>
	
  <!--A-->
  <ball onclick="openNav(2)" class='ball2'><b>A</b></ball>
	
  <!--C-->
  <ball onclick="openNav(3)" class='ball3'><b>C</b></ball>

  <!--title-->
  <s1 id="x1" class="sidenav"><!--背景板-->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav(1)">&times;</a><!--关闭按钮-->
  <form action="search.php" style="font-size:32px;"><!--建立表单-->
    <a>Paper Title:</a><!--标题-->
    <br><br>
    <input type="text" name="paper_title"><!--输入-->
    <input type="hidden" name="start" value=0><!--定义其他几个值-->
    <input type="hidden" name="author_name">
    <input type="hidden" name="conference_name">
    <br><br>
    <a class="btn-slide"><!--提交按钮-->
      <span class="circle"></span>
      <span class="title">Submit</span>
      <span class="title-hover">Click</span>
      <input type="submit" value="" id="sub">
    </a>
  </form>
  </s1>

  <!--author name-->
  <s2 id="x2" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav(2)">&times;</a>
  <form action="search.php" style="font-size:32px;">
    <a>Author Name:</a>
    <br><br>
    <input type="text" name="author_name">
    <input type="hidden" name="start" value=0>
    <input type="hidden" name="paper_title">
    <input type="hidden" name="conference_name">
    <br><br>
    <a class="btn-slide">
      <span class="circle"></span>
      <span class="title">Submit</span>
      <span class="title-hover">Click</span>
      <input type="submit" value="" id="sub">
    </a>
  </form>
  </s2>

  <!--conference-->
  <s3 id="x3" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav(3)">&times;</a>
  <form action="search.php" style="font-size:32px;">
    <a>Conference Name:</a>
    <br><br>
    <input type="text" name="conference_name">
    <input type="hidden" name="start" value=0>
    <input type="hidden" name="paper_title">
    <input type="hidden" name="author_name">
    <br><br>
    <a class="btn-slide">
      <span class="circle"></span>
      <span class="title">Submit</span>
      <span class="title-hover">Click</span>
      <input type="submit" value="" id="sub">
    </a>
  </form>
  </s3>
</div>
</body>
</html>