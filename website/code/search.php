<!DOCTYPE html> 
<html>
<head>
<title>search page example</title>

<style type="text/css">
	div.div1 a:link{color:#336699;text-decoration:none;}
	div.div1 a:visited{color:#336699;text-decoration: underline;}
	div.div1 a:hover{color: #0066CC;text-decoration:underline;}	
	div.div1 {font-size: 23px;font-family: Arial;display: inline;}
	div.div2 a:link{color:#336699;text-decoration:none; }
	div.div2 a:visited{color:#336699;text-decoration: underline;}
	div.div2 a:hover{color: #0066CC;text-decoration:underline;}	
	div.div2 {font-size: 15px;font-family: Arial;display: inline;}
	div.div3 a:link{color:#336699;text-decoration:none; }
	div.div3 a:visited{color:#336699;text-decoration: underline;}
	div.div3 a:hover{color: #0066CC;text-decoration:none;}
	div.div3 {font-size: 17px;font-family: Arial;display: inline;}
	.test{
    position: relative;
    left: 5%; width: 90%; top: 25px;
    font-weight: bold;
    background-image: -webkit-linear-gradient(left,blue,#66ffff 10%,#cc00ff 20%,#CC00CC 30%, #CCCCFF 40%, #00FFFF 50%,#CCCCFF 60%,#CC00CC 70%,#CC00FF 80%,#66FFFF 90%,blue 100%);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-background-size: 200% 100%;
    -webkit-animation: masked-animation 4s linear infinite;
    font-size: 35px;
}
@keyframes masked-animation {
  0% {
      background-position: 0  0;
  }
  100% {
      background-position: -100%  0;
  }
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
	background-color: #3399FF;
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
        num: 30,                        // 个数
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
      this.canvas.style.zIndex = '-1'
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
	$paper_title = $_GET["paper_title"];
		if ($paper_title and $paper_title!="''") {
			echo '<div class="test">Search for Title: '.$paper_title.'</div>';
		}
	?>
<div style="width:50%;">
	<?php
		$paper_title = $_GET["paper_title"];
		if ($paper_title and $paper_title!="''") {
			echo "<br><br><br>";
			$key=$paper_title;
			$rows=10;
			if(!$_GET["start"]){$start=0;}
			else{$start=$_GET["start"];}
			$ch = curl_init();
			$timeout = 5;
			$query = urlencode(str_replace(' ', '+', $paper_title));
			$url = "http://localhost:8983/solr/lab2/select?indent=on&q=Title:".$query."&wt=json"."&rows=$rows"."&start=$start";
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$result = json_decode(curl_exec($ch), true);
			curl_close($ch);
			foreach ($result['response']['docs'] as $paper) {
				echo "<table frame=\"above\" align=\"above\" width=\"800\" >";
				echo "<tr>";
				echo "<td align=\"left\">";
				$paper_id=$paper['PaperID'];
				$title=$paper['Title'];
				$key=explode(' ',$paper_title);
				foreach ($key as $data) {
					$title=str_replace($data,"<font color=red>$data</font>",$title);
				}
				echo "<div class=div1><b><a href=\"papers.php?page=1&paper_id=$paper_id\" >$title; </a></b></div>";
				echo "<br>";

				echo "<div=div2><align=\"left\">Authors:</div>";
				foreach ($paper['AuthorName'] as $idx => $author) {
					$author_id = $paper['AuthorID'][$idx];
					echo "<div class=div2><a href=\"author2.php?start=0&author=$author\">$author; </a></div>";
				}
				
				echo "<br>";
				echo "<div=div3><align=\"left\">Conferences:</div>";
				$conference_id=$paper['ConferenceID'];
				$conference_name=$paper['ConferenceName'];
				echo "<div class=div3><a href=\"conferences.php?page=1&conference_id=$conference_id\">$conference_name; </a></div>";
				echo "</td>";

				# 请补充针对Conference Name的显示

				echo "</tr>";
				echo "</table><br><br>";
			}
			$all_pages=$result["response"]["numFound"];
			$first_page=0;$this_page=$start;
			if($all_pages<=100 and $all_pages>10)
			{
				$total=(int)(($all_pages-1)/10);
				if($this_page==0)
				{
					for($i=1;$i<=$total+1;++$i){
						$page=($i-1)*10;
						if($i==1){echo "<div class=pagination><a href=\"search.php?paper_title=$paper_title&start=$page&author_name=''&conference_name=\"null\"\"class=\"cur\">$i  </a></div>";}
						else{echo "<div class=pagination><a href=\"search.php?paper_title=$paper_title&start=$page&author_name=''&conference_name=\"null\"\">$i  </a>";}
					}
					$next=($this_page+1)*10;
					echo "<a href=\"search.php?paper_title=$paper_title&start=$next&author_name=''&conference_name=\"null\"\">next  </a></div>";
				}
				else
				{
					$now=$this_page/10;
					$prev_page=$now-1;
					$next_page=$now+1;if($next_page>$total){$next_page=$total;}
					$prev=$prev_page*10;
					$next=$next_page*10;
					echo "<div class=pagination><a href=\"search.php?paper_title=$paper_title&start=$prev&author_name=''&conference_name=\"null\"\">prev  </a>";
					for($i=1;$i<=$total+1;++$i){
						$page=($i-1)*10;
						if($i==$now+1){echo "<a href=\"search.php?paper_title=$paper_title&start=$page&author_name=''&conference_name=\"null\"\"class=\"cur\">$i  </a>";}
						else{echo "<a href=\"search.php?paper_title=$paper_title&start=$page&author_name=''&conference_name=\"null\"\">$i  </a>";}
					}
					echo "<a href=\"search.php?paper_title=$paper_title&start=$next&author_name=''&conference_name=\"null\"\">next  </a></div>";
				}
			}
			elseif ($all_pages>100) 
			{
				$total=(int)(($all_pages-1)/10);
				if($this_page<=40)
				{
					if($this_page!=0){$p=$this_page-10;echo "<div class=pagination><a href=\"search.php?paper_title=$paper_title&start=$p&author_name=''&conference_name=\"null\"\">prev  </a></div>";}
					for($i=1;$i<=10;++$i){
						$page=($i-1)*10;
						if($i==($this_page/10)+1){echo "<div class=pagination><a href=\"search.php?paper_title=$paper_title&start=$page&author_name=''&conference_name=\"null\" \" class=\"cur\">$i  </a></div>";}
						else{echo "<div class=pagination><a href=\"search.php?paper_title=$paper_title&start=$page&author_name=''&conference_name=\"null\"\">$i  </a>";}
					}
					$next=$this_page+10;
					echo "<a href=\"search.php?paper_title=$paper_title&start=$next&author_name=''&conference_name=\"null\"\">next  </a></div>";
				}
				else
				{
					$now=$this_page/10;
					$prev_page=$now-1;
					$in_page=$now-4;
					$out_page=$now+5;if($out_page>$total){$next_page=$total;}
					$next_page=$now+1;if($next_page>$total){$next_page=$total;}
					$prev=$prev_page*10;$next=$next_page*10;
					$in=$in_page*10;$out=$out_page*10;
					echo "<div class=pagination><a href=\"search.php?paper_title=$paper_title&start=$prev&author_name=''&conference_name=\"null\"\">prev  </a>";
					for($i=$in_page;$i<=$out_page;++$i){
						$page=($i-1)*10;
						if($i==$now+1){echo "<a href=\"search.php?paper_title=$paper_title&start=$page&author_name=''&conference_name=\"null\" \" class=\"cur\">$i  </a>";}
						else{echo "<a href=\"search.php?paper_title=$paper_title&start=$page&author_name=''&conference_name=\"null\"\">$i  </a>";}
					}
					echo "<a href=\"search.php?paper_title=$paper_title&start=$next&author_name=''&conference_name=\"null\"\">next  </a></div>";
				}
			}
		
	?>

</div>
<div style="top: 100px; right:0px; width:40%; position: absolute;">
<!--张嘉乐title图-->
<?php
			echo "<div id='main1' style='width: 500px;height:300px;'></div>";
			require("vissearch1.php");
			echo "<div id='main2' style='width: 500px;height:300px;'></div>";
			require("vissearch2.php");
			echo "<div id='main3' style='width: 500px;height:300px;'></div>";
			require("vissearch3.php");
		}
	?>
</div>
<?php
		$paper_author_name = $_GET["author_name"];
		if ($paper_author_name and $paper_author_name!="''") {
			echo '<div class="test">Search for AuthorName: '.$paper_author_name.'</div>';
		}
?>
<div style="width:50%;">
	<?php
		//author查询
		$paper_author_name=$_GET["author_name"];
		if($paper_author_name and $paper_author_name!="''"){
			$key=$paper_author_name;
			$rows=10;
			if(!$_GET["start"]){$start=0;}
			else{$start=$_GET["start"];}
			echo "<br><br><br>";
			$ch = curl_init();
			$timeout = 5;
			$query = urlencode(str_replace(' ', '+', $paper_author_name));
			$url = "http://localhost:8983/solr/lab2/select?indent=on&q=AuthorName:".$query."&wt=json"."&rows=$rows"."&start=$start";
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$result = json_decode(curl_exec($ch), true);
			curl_close($ch);
			foreach ($result['response']['docs'] as $paper){
				echo "<table frame=\"above\" align=\"above\" width=\"800\" >";
				echo "<tr>";
				echo "<td align=\"left\">";
				$paper_id=$paper['PaperID'];
				$title=$paper['Title'];
				echo "<div class=div1><a href=\"papers.php?page=1&paper_id=$paper_id\">$title </a></div>";
				echo "<br>";
				echo "Author: ";
				$key=explode(' ',$paper_author_name);
				foreach ($paper['AuthorName'] as $idx => $author) {
					$author_id =$paper['AuthorID'][$idx];
					$author1=$author;
					foreach ($key as $value) {
						$author1=str_replace($value,"<font color=red>$value</font>",$author1);
					}
					echo "<div class=div2><a href=\"author2.php?start=0&author=$author\" >$author1; </a></div>";
				}
				echo "<br>";
				$conference_id=$paper['ConferenceID'];
				$conference_name=$paper['ConferenceName'];
				$one=1;
				echo "Conferences: ";
				echo "<div class=div3><a href=\"conferences.php?page=1&conference_id=$conference_id\">$conference_name </a></div>";

				# 请补充针对Conference Name的显示

				echo "</tr>";
				echo "<td>";
				echo "<br><br>";

			}
			$all_pages=$result["response"]["numFound"];
			$first_page=0;$this_page=$start;
			if($all_pages<=100 and $all_pages>10)
			{
				$total=(int)(($all_pages-1)/10);
				if($this_page==0)
				{
					for($i=1;$i<=$total+1;++$i){
						$page=($i-1)*10;
						if($i==1){echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$page&author_name=$paper_author_name&conference_name=\"null\" \" class=\"cur\">$i  </a></div>";}
						else{echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$page&author_name=$paper_author_name&conference_name=\"null\"\">$i  </a>";}
					}
					$next=($this_page+1)*10;
					echo "<a href=\"search.php?paper_title=''&start=$next&author_name=$paper_author_name&conference_name=\"null\"\">next  </a></div>";
				}
				else
				{
					$now=$this_page/10;
					$prev_page=$now-1;
					$next_page=$now+1;if($next_page>$total){$next_page=$total;}
					$prev=$prev_page*10;
					$next=$next_page*10;
					echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$prev&author_name=$paper_author_name&conference_name=\"null\"\">prev  </a>";
					for($i=1;$i<=$total+1;++$i){
						$page=($i-1)*10;
						if($i==$now+1){echo "<a href=\"search.php?paper_title=''&start=$page&author_name=$paper_author_name&conference_name=\"null\" \" class=\"cur\">$i  </a>";}
						else{echo "<a href=\"search.php?paper_title=''&start=$page&author_name=$paper_author_name&conference_name=\"null\"\">$i  </a>";}
					}
					echo "<a href=\"search.php?paper_title=''&start=$next&author_name=$paper_author_name&conference_name=\"null\"\">next  </a></div>";
				}
			}
			elseif ($all_pages>100) 
			{
				$total=(int)(($all_pages-1)/10);
				if($this_page<=40)
				{
					if($this_page!=0){$p=$this_page-10;echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$p&author_name=$paper_author_name&conference_name=\"null\"\">prev  </a></div>";}
					for($i=1;$i<=10;++$i){
						$page=($i-1)*10;
						if($i==($this_page/10)+1){echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$page&author_name=$paper_author_name&conference_name=\"null\" \" class=\"cur\">$i  </a></div>";}
						else{echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$page&author_name=$paper_author_name&conference_name=\"null\"\">$i  </a>";}
					}
					$next=$this_page+10;
					echo "<a href=\"search.php?paper_title=''&start=$next&author_name=$paper_author_name&conference_name=\"null\"\">next  </a></div>";
				}
				else
				{
					$now=$this_page/10;
					$prev_page=$now-1;
					$in_page=$now-4;
					$out_page=$now+5;if($out_page>$total){$next_page=$total;}
					$next_page=$now+1;if($next_page>$total){$next_page=$total;}
					$prev=$prev_page*10;$next=$next_page*10;
					$in=$in_page*10;$out=$out_page*10;
					echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$prev&author_name=$paper_author_name&conference_name=\"null\"\">prev  </a>";
					for($i=$in_page;$i<=$out_page;++$i){
						$page=($i-1)*10;
						if($i==$now+1){echo "<a href=\"search.php?paper_title=''&start=$page&author_name=$paper_author_name&conference_name=\"null\" \" class=\"cur\">$i  </a>";}
						else{echo "<a href=\"search.php?paper_title=''&start=$page&author_name=$paper_author_name&conference_name=\"null\"\">$i  </a>";}
					}
					echo "<a href=\"search.php?paper_title=''&start=$next&author_name=$paper_author_name&conference_name=\"null\"\">next  </a></div>";
				}
			}
	?>
</div>
<div style="top:100px; right:0px; width:40%; position: absolute;">
	<?php
			echo "<div id='main1' style='width: 500px;height:300px;'></div>";
			require("vissearch1.php");
			echo "<div id='main2' style='width: 500px;height:300px;'></div>";
			require("vissearch2.php");
			echo "<div id='main3' style='width: 500px;height:300px;'></div>";
			require("vissearch3.php");
		}
	?>
</div>
<?php
		$paper_conference_name = $_GET["conference_name"];
		if ($paper_conference_name and $paper_conference_name!="''") {
			echo '<div class="test">Search for ConferenceName: '.$paper_conference_name.'</div>';
		}
?>
<div style="width:50%;">
	<?php
		$paper_conference_name=$_GET["conference_name"];
		if($paper_conference_name and $paper_conference_name!="''"){
			echo "<br><br><br><br>";
			$rows=10;
			if(!$_GET["start"]){$start=0;}
			else{$start=$_GET["start"];}
			$ch = curl_init();
			$timeout = 5;
			$query = urlencode(str_replace(' ', '+', $paper_conference_name));
			$url = "http://localhost:8983/solr/lab2/select?indent=on&q=ConferenceName:".$query."&wt=json"."&rows=$rows"."&start=$start";

			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$result = json_decode(curl_exec($ch), true);
			curl_close($ch);
			
			foreach ($result['response']['docs'] as $paper){
				echo "<table frame=\"above\" align=\"above\" width=\"800\" >";
				echo "<tr>";
				echo "<td align=\"left\">";
				$paper_id=$paper['PaperID'];
				$title=$paper['Title'];
				echo "<div class=div1><a href=\"papers.php?page=1&paper_id=$paper_id\">$title; <br></a></div>";
				echo "Authors: ";
				foreach ($paper['AuthorName'] as $idx => $author) {
					$author_id =$paper['AuthorID'][$idx];
					echo "<div class=div2><a href=\"author2.php?start=0&author=$author\">$author; </a></div>";
				}
				echo "<br>";
				echo "Conferences: ";
				$conference_id=$paper['ConferenceID'];
				$conference_name=$paper['ConferenceName'];
				$one=1;
				$conference_name=str_replace($paper_conference_name,"<font color=red>$paper_conference_name</font>",$conference_name);
				echo "<div class=div3><a href=\"conferences.php?page=1&conference_id=$conference_id\">$conference_name; </a></div>";
				echo "</td>";

				# 请补充针对Conference Name的显示

				echo "</tr>";
				echo "</table><br><br>";
			}
			$all_pages=$result["response"]["numFound"];
			$first_page=0;$this_page=$start;
			if($all_pages<=100 and $all_pages>10)
			{
				$total=(int)(($all_pages-1)/10);
				if($this_page==0)
				{
					for($i=1;$i<=$total+1;++$i){
						$page=($i-1)*10;
						if($i==1){echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$page&conference_name=$paper_conference_name&author_name=\"null\" \" class=\"cur\">$i  </a></div>";}
						else{echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$page&conference_name=$paper_conference_name&author_name=\"null\"\">$i  </a>";}
					}
					$next=($this_page+1)*10;
					echo "<a href=\"search.php?paper_title=''&start=$next&conference_name=$paper_conference_name&author_name=\"null\"\">next  </a></div>";
				}
				else
				{
					$now=$this_page/10;
					$prev_page=$now-1;
					$next_page=$now+1;if($next_page>$total){$next_page=$total;}
					$prev=$prev_page*10;
					$next=$next_page*10;
					echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$prev&conference_name=$paper_conference_name&author_name=\"null\"\">prev  </a>";
					for($i=1;$i<=$total+1;++$i){
						$page=($i-1)*10;
						if($i==$now+1){echo "<a href=\"search.php?paper_title=''&start=$page&conference_name=$paper_conference_name&author_name=\"null\" \" class=\"cur\">$i  </a>";}
						else{echo "<a href=\"search.php?paper_title=''&start=$page&conference_name=$paper_conference_name&author_name=\"null\"\">$i  </a>";}
					}
					echo "<a href=\"search.php?paper_title=''&start=$next&conference_name=$paper_conference_name&author_name=\"null\"\">next  </a></div>";
				}
			}
			elseif ($all_pages>100) 
			{
				$total=(int)(($all_pages-1)/10);
				if($this_page<=40)
				{
					if($this_page!=0){$p=$this_page-10;echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$p&conference_name=$paper_conference_name&author_name=\"null\"\">prev  </a></div>";}
					for($i=1;$i<=10;++$i){
						$page=($i-1)*10;
						if($i==($this_page/10)+1){echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$page&conference_name=$paper_conference_name&author_name=\"null\" \" class=\"cur\">$i  </a></div>";}
						else{echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$page&conference_name=$paper_conference_name&author_name=\"null\"\">$i  </a>";}
					}
					$next=$this_page+10;
					echo "<a href=\"search.php?paper_title=''&start=$next&conference_name=$paper_conference_name&author_name=\"null\"\">next  </a></div>";
				}
				else
				{
					$now=$this_page/10;
					$prev_page=$now-1;
					$in_page=$now-4;
					$out_page=$now+5;if($out_page>$total){$next_page=$total;}
					$next_page=$now+1;if($next_page>$total){$next_page=$total;}
					$prev=$prev_page*10;$next=$next_page*10;
					$in=$in_page*10;$out=$out_page*10;
					echo "<div class=pagination><a href=\"search.php?paper_title=''&start=$prev&conference_name=$paper_conference_name&author_name=\"null\"\">prev  </a>";
					for($i=$in_page;$i<=$out_page;++$i){
						$page=($i-1)*10;
						if($i==$now+1){echo "<a href=\"search.php?paper_title=''&start=$page&conference_name=$paper_conference_name&author_name=\"null\" \" class=\"cur\">$i  </a>";}
						else{echo "<a href=\"search.php?paper_title=''&start=$page&conference_name=$paper_conference_name&author_name=\"null\"\">$i  </a>";}
					}
					echo "<a href=\"search.php?paper_title=''&start=$next&conference_name=$paper_conference_name&author_name=\"null\"\">next  </a></div>";
				}
			}
		
	?>
</div>
<div style="top:100px; right:0px; width:40%; position: absolute;">
<?php
			echo "<div id='main1' style='width: 500px;height:300px;'></div>";
			require("vissearch1.php");
			//echo "<div id='main2' style='width: 500px;height:300px;'></div>";require("vissearch2.php");
			echo "<div id='main3' style='width: 500px;height:300px;'></div>";
			require("vissearch3.php");
		}
	?>
</div>

</body>

</html>