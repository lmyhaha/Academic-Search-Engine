<!DOCTYPE html> 
<html>
<head>
<title>search page example</title>
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
	font-size: 20px;
	background-color: rgba(255,255,240,0.5);
}
th,tr,td {
	padding: 1.25em;
    border-bottom: 1px solid #ddd;
    border-top: 1px solid #ddd;
    text-align: center;
}
tr:hover {
    background: linear-gradient(#00FFFF, #F8F8FF);
}
	* {
		padding: 0;
		margin: 0;
	}
	.pagination {
	margin: 0;
	padding: 0;
	font-size: 12px;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	}

	.pagination a, .pagination a:link {
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

	.pagination a:hover {
	border: 1px solid #006699;
	color: #000000;
	background-color: #3399FF;
	}
	.pagination a:active{
	border: 1px solid #006699;
	color: #000000;
	background-color: #3399FF;
	}
	}
	.pagination span.elli_page {
	margin: 0 5px 0 0;
	padding: 2px 5px 2px 5px;
	}
	.pagination {display: inline;font-size: 15px;}
	.pagination a.cur{
	background-color:#3399FF;
	color: #000000;
	border:  1px solid #006699;
	}
	body {
		text-align: center;
	}
	/*home按钮*/
.spinningeffect img {
transition: all 0.8s ease-in-out;
}
.spinningeffect img:hover {
transform: rotate(360deg);
}
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
	<?php
		$author0 = $_GET["author"];
		echo "<div class=\"link link--kukuri\" data-letters=\"Author\">Author</div>";
	?>
	<div style="width:50%;">
	<?php
		$author0 = $_GET["author"];
		if ($author0) {
			$rows=10;
			if(!$_GET["start"]){$start=0;}
			else{$start=$_GET["start"];}
			echo "<div style=\"font-size:30px\">Name: $author0</div>";
			$ch = curl_init();
			$timeout = 5;
			$author1=str_replace(' ', '+', $author0);
			$author1="\"$author1\"";
			$query = urlencode($author1);
			$url = "http://localhost:8983/solr/lab2/select?q=AuthorName:".$query."&wt=json"."&rows=$rows"."&start=$start";
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$result = json_decode(curl_exec($ch), true);
			curl_close($ch);
			echo "<table align=\"center\" width=\"100%\" ><tr><th>Title</th><th>Authors</th><th>Conference</th><th>PublishYear</th></tr>";
			foreach ($result["response"]["docs"] as $paper) {
				echo "<tr>";
				echo "<td>";
				$paper_id=$paper['PaperID'];
				$title=$paper['Title'];
				echo "<div class=div2><a href=\"/papers.php?page=1&paper_id=$paper_id\" >$title; </a></div></td>";
				echo "<td>";
				foreach ($paper['AuthorName'] as $idx => $author) {
					$author_id = $paper['AuthorID'][$idx];
					echo "<div class=div2><a href=\"/author2.php?start=0&author=$author\">$author; </a></div><br>";
				}
				echo "</td>";
				$conference_id=$paper['ConferenceID'];
				$conference_name=$paper['ConferenceName'];
				echo "<td>";
				echo "<div class=div2><a href=\"/conferences.php?page=1&conference_id=$conference_id\">$conference_name; </a></div>";
				echo "</td>";
				$year=$paper['Year'];
				echo "<td>$year</td>";
				# 请补充针对Conference Name的显示

				echo "</tr>";	
			}echo "</table><br><br>";
			$all_pages=$result["response"]["numFound"];
			$first_page=0;$this_page=$start;
			if($all_pages<=100 and $all_pages>10)
			{
				$total=(int)(($all_pages-1)/10);
				if($this_page==0)
				{
					for($i=1;$i<=$total+1;++$i){
						$page=($i-1)*10;
						if($i==1){echo "<div class=pagination><a href=\"/author2.php?author=$author0&start=$page\"class=\"cur\">$i  </a></div>";}
						else{echo "<div class=pagination><a href=\"/author2.php?author=$author0&start=$page\">$i  </a>";}
					}
					$next=($this_page+1)*10;
					echo "<a href=\"/author2.php?author=$author0&start=$next\">next  </a></div>";
				}
				else
				{
					$now=$this_page/10;
					$prev_page=$now-1;
					$next_page=$now+1;if($next_page>$total){$next_page=$total;}
					$prev=$prev_page*10;
					$next=$next_page*10;
					echo "<div class=pagination><a href=\"/author2.php?author=$author0&start=$prev\">prev  </a>";
					for($i=1;$i<=$total+1;++$i){
						$page=($i-1)*10;
						if($i==$now+1){echo "<a href=\"/author2.php?author=$author0&start=$page\"class=\"cur\">$i  </a>";}
						else{echo "<a href=\"/author2.php?author=$author0&start=$page\">$i  </a>";}
					}
					echo "<a href=\"/author2.php?author=$author0&start=$next\">next  </a></div>";
				}
			}
		}
	?>
	</div>
	<div style="top:120px; right:0px; width:40%; position: absolute;">
	<?php
		echo "<div id='main1' style='width: 500px;height:300px;'></div>";
		require("visauthor1.php");
		echo "<div id='main2' style='width: 500px;height:300px;'></div>";
		require("visauthor2.php");
	?>
	</div>
</body>
</html>