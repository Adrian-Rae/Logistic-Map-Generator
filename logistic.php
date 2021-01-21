<!DOCTYPE html>
<html>
	<head>
		<title> Logistic Map Generator </title>
	</head>
	<body>
		<canvas id="myCanvas" width="1300" height="600" style="border:1px solid #000000;"></canvas><br>
		x0 <input id="x0" type="number" min="0" max="3" step="1" value="0"><br>
		x1 <input id="x1" type="number" min="1" max="4" step="1" value="4"><br>
		y0 <input id="y0" type="number" min="0" max="0" step="1" value="0"><br>
		y1 <input id="y1" type="number" min="1" max="3" step="1" value="1"><br>
		<button onclick="draw()"> Render </button>
	</body>
	<script>
			
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");

		var x0 = 0;
		var y0 = 0;
		var x1 = 0;
		var y1 = 0;
		var n = 10000;
		var dx = 1;
		var dy = 1;
		var renderThickness = 0.4;


		function draw(){
			x0 = 1*document.getElementById('x0').value;
			y0 = 1*document.getElementById('y0').value;
			x1 = 1*document.getElementById('x1').value;
			y1 = 1*document.getElementById('y1').value;
			dx = (x1-x0)/n;
			dy = (y1-y0)/n;
			ctx.clearRect(0, 0, c.width, c.height);
			for(var i=x0; i<=x1; i+=dx){
				plot(i);
			}
		}

		function plot(x){
			
			var y = 0.2;
			//*/
			for(var i=0; i<500; i++){y=logistic(x,y);} //get to equilibrium
			for(var j=0; j<100; j++){
				//actual drawing
				y=logistic(x,y);
				var px = ((x-x0)/(x1-x0))*1300;
				var py = -1+((y1-y)/(y1-y0))*600;
				ctx.fillStyle = "#000000";
				ctx.fillRect(px,py,renderThickness,renderThickness);
				
			}
			//*/
		}

		function logistic(r,x){
			return r*inner(x);
		}
		function inner(x){
			return x*(1-x);
		}


	</script>
</html>