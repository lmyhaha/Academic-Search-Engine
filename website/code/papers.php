<!DOCTYPE html> 
<html>
<head>
<title>author page example</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
function details() {
	document.getElementById("det").style.display="inline"; 
	document.getElementById("aut").style.display="none";
	document.getElementById("ref").style.display="none";
	document.getElementById("de").style.backgroundColor="#ddd";
	document.getElementById("de").style.color="black";
	document.getElementById("au").style.backgroundColor="#333";
	document.getElementById("au").style.color="white";
	document.getElementById("re").style.backgroundColor="#333";
	document.getElementById("re").style.color="white";
}

function authors() {
	document.getElementById("det").style.display="none"; 
	document.getElementById("aut").style.display="inline";
	document.getElementById("ref").style.display="none";
	document.getElementById("de").style.backgroundColor="#333";	
	document.getElementById("de").style.color="white";
	document.getElementById("au").style.backgroundColor="#ddd";
	document.getElementById("au").style.color="black";
	document.getElementById("re").style.backgroundColor="#333";
	document.getElementById("re").style.color="white";
}
function reference() {
	document.getElementById("det").style.display="none";
	document.getElementById("aut").style.display="none";
	document.getElementById("ref").style.display="inline";
	document.getElementById("de").style.backgroundColor="#333";	
	document.getElementById("de").style.color="white"; 
	document.getElementById("au").style.backgroundColor="#333";
	document.getElementById("au").style.color="white";
	document.getElementById("re").style.backgroundColor="#ddd";
	document.getElementById("re").style.color="black";
}

 window.onload=details();

</script>

<style type="text/css">
div.div2 a:link{color:#336699;text-decoration:none; }
div.div2 a:visited{color:#336699;text-decoration: underline;}
div.div2 a:hover{color: #0066CC;text-decoration:underline;}	
div.div2 {font-size: 20px;font-family: Arial;display: inline;}
.link {
	outline: none;
	text-decoration: none;
	position: relative;
	font-size: 8em;
	line-height: 1;
	color: #9e9ba4;
	display: inline-block;
}

.link--kukuri {
	text-transform: uppercase;
	font-weight: 900;
	overflow: hidden;
	line-height: 0.75;
	color: #c5c2b8;
}

.link--kukuri:hover {
	color: #c5c2b8;
}

.link--kukuri::after {
	content: '';
	position: absolute;
	z-index: 2;
	height: 16px;
	width: 100%;
	top: 50%;
	margin-top: -8px;
	right: 0;
	background: #F9F9F9;
	-webkit-transform: translate3d(-100%,0,0);
	transform: translate3d(-100%,0,0);
	-webkit-transition: -webkit-transform 0.4s;
	transition: transform 0.4s;
	-webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
	transition-timing-function: cubic-bezier(0.7,0,0.3,1);
}

.link--kukuri:hover::after {
	-webkit-transform: translate3d(100%,0,0);
	transform: translate3d(100%,0,0);
}

.link--kukuri::before {
	content: attr(data-letters);
	position: absolute;
	z-index: 2;
	overflow: hidden;
	color: #424242;
	white-space: nowrap;
	width: 0%;
	-webkit-transition: width 0.4s 0.3s;
	transition: width 0.4s 0.3s;
}

.link--kukuri:hover::before {
	width: 100%;
}
table {
	width:100%;
	font-size: 20px;
	background-color: rgba(255,255,240,0.5);
}
tr,td {
	padding: 1.25em;
    border-bottom: 1px solid #ddd;
    border-top: 1px solid #ddd;
    text-align: center;
}
tr:hover {
    background: linear-gradient(#00FFFF, #F8F8FF);
}

* {
  box-sizing: border-box;
}

body {
  text-align: center;
  margin: 0;
}
.pagination {
	margin: 0;
	padding: 0;
	font-size: 12px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	}

.pagination a, .pagination a:link, .pagination a:visited {
	margin: 0 5px 0 0;
	padding: 2px 5px 2px 5px;
	border: 1px solid #aaaadd;
	color: #006699;
	text-decoration: none;
	}

.pagination span.curr_page {
	margin: 0 5px 0 0;
	padding: 2px 5px 2px 5px;
	font-weight: bold;
	color: #ffffff;
	border: 1px solid #006699;
	background-color: #006699;
	}

.pagination a:hover, .pagination a:active {
	border: 1px solid #006699;
	color: #000000;
	}

.pagination span.elli_page {
	margin: 0 5px 0 0;
	padding: 2px 5px 2px 5px;
	}
.pagination {display: inline;font-size: 15px;}
/* 头部样式 */
.header {
  padding: 20px;
  text-align: center;
  font-size:40px;
}

/* 导航条 */
.topnav {
  overflow: hidden;
  background-color: #333;
  width:50%;
}

/* 导航链接 */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  cursor:pointer;
}

/* 链接 - 修改颜色 */
.topnav a:hover {
  background-color: #ddd !important;
  color: black !important;
}

/* 创建两个相等的列 */
.column {
  float: left;
  width: 50%;
}
 
/* 列后清除浮动 */
.row:after {
  content: "";
  display: table;
  clear: both;
}
 
/* 响应式布局 - 小于 600 px 时改为上下布局 */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
/*home按钮*/
.spinningeffect img {
transition: all 0.8s ease-in-out;
}
.spinningeffect img:hover {
transform: rotate(360deg);
}

/* 子元素显示 */
nav menuitem {
   position:relative;
   display:block;
   opacity:0;
   cursor:pointer;
}

/* 并列菜单定位 */
nav menuitem > menu {
   position: absolute;
   pointer-events:none;
}

/*菜单长度*/
nav > menu { display:-webkit-box; display:-ms-flexbox; display:flex; }

/* 菜单初始显示 */
nav > menu > menuitem { pointer-events: all; opacity:1; }

/*菜单防止上下遮掩*/
menu menuitem a { white-space:nowrap; display:block; }

/*子菜单可点击*/
menuitem:hover > menu {
   pointer-events:initial;
}

menuitem:hover > menu > menuitem,
menu:hover > menuitem{
   opacity:1;
}

/*子菜单右置*/
nav > menu > menuitem menu {
   transform:translateX(100%);
   top:0; right:0;
}

/*整体定位*/
nav { 
   margin-top: 40px;
   margin-left: 40px;
}

/*菜单框属性*/
nav a {
   background:#75F;
   color:#FFF;
   width:700px;
   transition: background 0.5s, color 0.5s, transform 0.5s;
   margin:0px 6px 6px 0px;
   padding:20px 40px;
   text-decoration: none;
   box-sizing:border-box;
   border-radius:3px;
   box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);
   position:relative;
}

/*选中变色*/
nav a:hover:before {
   content: '';
   top:0;left:0;
   position:absolute;
   background:rgba(0, 0, 0, 0.2);
   width:100%;
   height:100%;
}

/*右箭头*/
nav > menu > menuitem > a + menu:after{ 
   content: '';
   position:absolute;
   border:10px solid transparent;
   border-left: 10px solid white;
   top: 22px;
   left: -688px;
   transition: opacity 0.6, transform 0s;
}

/*菜单打开动画*/
nav > menu > menuitem > menu > menuitem{
   transition: transform 0.6s, opacity 0.6s;
   transform:translateX(405px) translateY(0%);
   opacity: 0;
}
nav > menu > menuitem:hover > menu > menuitem,
nav > menu > menuitem.hover > menu > menuitem{
   transform:translateX(0) translateY(0%);
   opacity: 1;
}
/* effect-au css */
nav { 
   margin-top: 40px;
   margin-left: 40px;
}
*{margin: 0; padding: 0; box-sizing: border-box;}
.loadq {
    position: absolute;
    width: 263px;
    height: 306px;
    font-size: 30px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url(au.gif);
    background-size:100% 100%;
    color:green;
}
.loadq a:link{color:#00FF00;text-decoration:none;}
.loadq a:visited{color:#00FF00;text-decoration: none;}

li{
   float: left;
   width: 271px;
   height: 306px;
   list-style: none;
   margin-top: 40px;
   margin-left: 40px;
}

.text-desc{
   position: absolute; 
   left: 0; 
   top: 0; 
   font-size: 16px;
   background-color: rgb(238,153,34); 
   height: 100%; 
   opacity: 0; 
   width: 100%; 
   padding: 200px;
}
.text-desc a:link{color:#A52A2A;text-decoration:none;}
.text-desc a:visited{color:#A52A2A;text-decoration: none;}
.port{
   float: left; 
   width: 100%; 
   position: relative; 
   overflow: hidden; 
   text-align: center; 
   border: 4px solid rgba(238,153,34, 0.9); 
   overflow: visible;
}
.port.effect .loadq{
   transition: 0.5s;
}
.port.effect:hover .loadq{
   transform: scale(0.3) translateY(-110%); 
   position: relative; 
   z-index: 9;
}
.port.effect .text-desc{
   transform: translateY(100%); 
   opacity: 0; 
   padding: 125px 20px 10px; 
   transition: 0.5s;
}
.port.effect:hover .text-desc{
   transform: translateY(0px); 
   opacity: 1;
}
/* effect-au css end */
</style>
</head>

<body>
	<a class="spinningeffect" href="index.php" style="float:left;left:25px;top:25px;position:absolute;"> 
		<img src="home.png" width="50" height="40">
	</a> 
	<div id="bubble"></div>
	<script type="text/javascript">
		class BGBubble {
    constructor(opts) {
      this.defaultOpts = {
        id: '',                           //容器ID
        num: 20,                        // 个数
        start_probability: 0.004,          // 如果数量小于num，有这些几率添加一个新的
        radius_min: 1,                   // 初始半径最小值
        radius_max: 2,                   // 初始半径最大值
        radius_add_min: .2,               // 半径增加最小值
        radius_add_max: .4,               // 半径增加最大值
        opacity_min: 0.3,                 // 初始透明度最小值
        opacity_max: 0.5,                // 初始透明度最大值
        opacity_prev_min: .0015,            // 透明度递减值最小值
        opacity_prev_max: .0020,            // 透明度递减值最大值
        light_min: 40,                 // 颜色亮度最小值
        light_max: 70,                 // 颜色亮度最大值
        is_same_color: false          //泡泡颜色是否相同
      }
      if (Object.prototype.toString.call(opts) == "[object Object]") {
        this.userOpts = {...this.defaultOpts, ...opts}
      } else {
        this.userOpts = {...this.defaultOpts, id: opts}
      }
      this.color = 101
      this.bubbleNum = []
      this.requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame || window.msRequestAnimationFrame
      this.cancelAnimationFrame = window.cancelAnimationFrame || window.mozCancelAnimationFrame
    }

    random(a, b) {
      return Math.random() * (b - a) + a    //取a-b之间的随机值
    }

    initBubble(color, isSameColor) {
      const width = window.innerWidth
      const height = window.innerHeight
      const userOpts = this.userOpts
      const light = this.random(userOpts.light_min, userOpts.light_max)
      this.bubble = {
        x: this.random(0, width),
        y: this.random(0, height),
        radius: this.random(userOpts.radius_min, userOpts.radius_max),
        radiusChange: this.random(userOpts.radius_add_min, userOpts.radius_add_max),
        opacity: this.random(userOpts.opacity_min, userOpts.opacity_max),
        opacityChange: this.random(userOpts.opacity_prev_min, userOpts.opacity_prev_max),
        light,
        color: `hsl(${isSameColor ? color : this.random(200, 280)},100%,${light}%)`,
      }
    }

    bubbling(ctx, color, isSameColor) {
      !this.bubble && this.initBubble(color, isSameColor)
      const bubble = this.bubble
      ctx.fillStyle = bubble.color;
      ctx.globalAlpha = bubble.opacity;
      ctx.beginPath();
      ctx.arc(bubble.x, bubble.y, bubble.radius, 0, 2 * Math.PI, true);
      ctx.closePath();
      ctx.fill();
      ctx.globalAlpha = 1;
      bubble.opacity -= bubble.opacityChange;
      bubble.radius += bubble.radiusChange;
      if (bubble.opacity <= 0) {
        this.initBubble(color, isSameColor)
        return
      }
    }

    createCanvas() {
      this.canvas = document.createElement('canvas')
      this.ctx = this.canvas.getContext('2d')
      this.canvas.style.display = 'block'        //防止全屏的canvas出现滚动条
      this.canvas.width = window.innerWidth
      this.canvas.height = window.innerHeight
      this.canvas.style.position = 'fixed'
      this.canvas.style.top = '0'
      this.canvas.style.left = '0'
      this.canvas.style.zIndex = '-20'
      document.getElementById(this.userOpts.id).appendChild(this.canvas)
      window.onresize = () => {
        this.canvas.width = window.innerWidth
        this.canvas.height = window.innerHeight
      }
    }

    start() {
      const width = window.innerWidth
      const height = window.innerHeight
      this.ctx.fillStyle = `hsl(${this.color},98%,95%)`
      this.ctx.fillRect(0, 0, width, height);
      if (this.bubbleNum.length < this.userOpts.num && Math.random() < this.userOpts.start_probability) {
        this.bubbleNum.push(new BGBubble())
      }
      this.bubbleNum.forEach(bubble => bubble.bubbling(this.ctx, this.color, this.userOpts.is_same_color))
      const requestAnimationFrame = this.requestAnimationFrame
      this.myReq = setTimeout(requestAnimationFrame(() => this.start()), 1000)   //新的动画API可根据浏览设置最佳动画间隔时间
    }
  }

  const bubbleDemo = new BGBubble('bubble')
  bubbleDemo.createCanvas()
  bubbleDemo.start()
	</script>
	<div class='link link--kukuri' data-letters="paper">
  	<?php
		echo "paper";
	?>
	</div>

<div class="topnav">
  <a id="de" onclick="details()" style="background-color: #ddd; color: black;">Details</a>
  <a id="au" onclick="authors()">Authors</a>
  <a id="re" onclick="reference()">Reference</a>
</div>

<div class="row">
  <div id="det" style="display:inline;" class="column">
    <?php
		ini_set('max_execution_time', '100');
		$paper_id = $_GET["paper_id"];
		$ch = curl_init();
		$timeout = 5;
		$paper_id1=str_replace(' ', '+', $paper_id);
		$paper_id1="\"$paper_id1\"";
		$query = urlencode($paper_id1);
		$url = "http://localhost:8983/solr/lab2/select?q=PaperID:".$query."&wt=json";
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$result = json_decode(curl_exec($ch), true);
		curl_close($ch);
		$paper=$result["response"]["docs"][0];
		$paper_name =$paper["Title"];
		$conference_id = $paper['ConferenceID'];
		$conference_name = $paper['ConferenceName'];
		$paper_publish_year=$paper['Year'];
		echo "<table>";
		echo "<tr>";
		echo "<td width=\"30\">Title</td>"; 
		echo "<td>$paper_name</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Publish year</td>"; 
		echo "<td>$paper_publish_year</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>ConferenceName</td>";
		echo "<td><div class=div2><a href=\"conferences.php?page=1&conference_id=$conference_id\">$conference_name</a></div></td>";
		echo "</tr>";
		$link = mysqli_connect("localhost:3306", 'root', '', 'LAB1');
		$result0 = mysqli_query($link, "SELECT affiliations.AffiliationID, affiliations.AffiliationName from (select AffiliationID, count(*)  from paper_author_affiliation where PaperID='$paper_id' and AffiliationID is not null group by AffiliationID order by count(*) desc) as tmp inner join affiliations on tmp.AffiliationID = affiliations.AffiliationID");
		if($result0!=null)
		{
			$affiliation_name=mysqli_fetch_array($result0)['AffiliationName'];
			if($affiliation_name!=null)
			{
				echo "<tr>";
				echo "<td>Affiliations</td>"; 
				echo "<td>$affiliation_name</td>";
				echo "</tr>";
				while($affiliation_name=mysqli_fetch_array($result0)['AffiliationName']) {
					echo "<tr>";
					echo "<td>Affiliations</td>"; 
					echo "<td>$affiliation_name</td>";
					echo "</tr>";
				}
			}
			else{	
				echo "<tr>";
				echo "<td>Affiliation</td>";
				echo "<td>Affiliation not found</td>"; 
				echo "</tr>";
			}
		}
		echo "</table>";
	?>
</div>

<div id="aut" style="display:none;" class="column">
    <?php
		foreach ($paper['AuthorName'] as $idx => $author){
			$author_id=$paper['AuthorID'][$idx];
			$author_name=$paper['AuthorName'][$idx];
			echo "<li><div class=\"port effect\"><div class=\"image-box\"><div class=\"loadq\"><a href=\"/author2.php?start=1&author=$author_name\">$author_name </a></div></div>";
			$ch = curl_init();
			$timeout = 5;
			$author_name1=str_replace(' ', '+', $author_name);
			$author_name1="\"$author_name1\"";
			$query = urlencode($author_name1);
			$url = "http://localhost:8983/solr/lab2/select?q=AuthorName:".$query."&wt=json"."&rows=3";
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$result1 = json_decode(curl_exec($ch), true);
			curl_close($ch);
			echo "<div class=\"text-desc\">";
			foreach ($result1["response"]["docs"] as $paper1){
				$title=$paper1['Title'];
				$paper_id0=$paper1['PaperID'];
				echo "<p><a href=\"papers.php?paper_id=$paper_id0\">$title; </a></p>";
			}
			echo "</div>";
			echo "</div>";
		}
		echo"</li>";
	?>
</div>

<div id="ref" style="display:none;" class="column">
	 <nav>
	 <?php
	 if(count($paper)!=9)
		{
			foreach ($paper['ReferenceName'] as $idx => $reference)
			{
				$reference_name=$paper['ReferenceName'][$idx];
				$reference_id=$paper['ReferenceID'][$idx];
				echo "<menu><menuitem><a href=\"papers.php?paper_id=$reference_id\">$reference_name </a><menu>";
				$ch = curl_init();
				$timeout = 5;
				$paper_name2=str_replace(' ', '+', $reference_name);
				$paper_name2="\"$paper_name2\"";
				$query = urlencode($paper_name2);
				$url = "http://localhost:8983/solr/lab2/select?q=ReferenceName:".$query."&wt=json"."&rows=3";
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$result2 = json_decode(curl_exec($ch), true);
				curl_close($ch);
				foreach ($result2["response"]["docs"] as $paper2)
				{
					$paperid=$paper2['PaperID'];
					$papername=$paper2['Title'];
					echo "<menuitem><a href=\"papers.php?paper_id=$paperid\">$papername </a></menuitem>";
				}
				echo "</menu></menuitem></menu>";
			}
		}
		else
		{
			echo "<div style='font-size:25px'>Reference doesn't exist</div>";
			echo "<img src=\"yasuo.jpg\" width=\"80%\">";
		}
      ?>
   </nav>
</div>

<div class="column">
    <?php
    echo "<div id='main3' style='top:-20px; width:700px;height:480px;  z-index:-10;'></div>";
		require("vispaper3.php");
    if(count($paper)!=9)
    {
    	echo "<div id='main1' style='top:-110px;width:700px;height:480px; z-index:-10;'></div>";
		require("vispaper1.php");
		echo "<div id='main2' style='top:-110px;width:700px;height:480px;  z-index:-10;'></div>";
		require("vispaper2.php");
		
    }
    ?>
  </div>
</div>

</body>

</html>