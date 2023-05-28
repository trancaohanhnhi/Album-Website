<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script type ="text/javascript" src="file:///D:/xampp/htdocs/category/scrpits/searchprice_view.js"></script>
	<link href="../styles/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="row">
		<div class="col-lg-7"></div>
		<div class="row col-lg-5">
			<div class="col-lg-8 col-10 text-center justify-content-center">
				<b><span id="sotientu-text">0</span>-<span id="sotienden-text">3000000</span></b>
			</div>
			<div class="col-12">
				<form class="range-input" action="" method="get">
					<div class="group">
						<div class="progress"></div>			
						<input class="range-min" max="3000000" type="range" name="keyword_sotientu" id="sotientu" value="0">					
						<input class="range-max" max="3000000" type="range" name="keyword_sotienden" id="sotienden" value="3000000">	
					</div>
					<br>
					<button id="searchclick" class="btn btn-outline-light" type="submit" aria-pressed="true">Tìm kiếm</button>
				</form>
			</div>
		</div>					
	</div>
	<br>
	<script>
		let rangeInput = document.querySelectorAll('.range-input input');
		let progress = document.querySelector('.progress');
		let priceMax = rangeInput[0].max;
		let priceGap = 0;

		rangeInput.forEach(input => {
			input.addEventListener('input', (event) => {
				let minVal = parseInt(rangeInput[0].value);
				let maxVal = parseInt(rangeInput[1].value);

				if(maxVal - minVal < priceGap){
					if(event.target.className === 'range-min'){
						minVal = rangeInput[0].value = maxVal - priceGap;
					}else{
						maxVal = rangeInput[1].value = minVal + priceGap;
					}
				}
				let positionMin = (minVal / priceMax) * 100;
				let positionMax = 100 - ((maxVal / priceMax) * 100);
				progress.style.left = positionMin + '%';
				progress.style.right = positionMax + '%';

				var sotientu =document.getElementById("sotientu");
				var sotientut = document.getElementById("sotientu-text");
				sotientut.innerHTML = sotientu.value;
				sotientu.oninput =function(){
					sotientut.innerHTML = this.value.toLocaleString();
				}

				var sotienden =document.getElementById("sotienden");
				var sotiendent = document.getElementById("sotienden-text");
				sotiendent.innerHTML = sotienden.value;
				sotienden.oninput =function(){
					sotiendent.innerHTML = this.value.toLocaleString();
				}
			})
		})	
	</script>
</body>
<style>	
	.group{
		background-color: #CBC2B9;
		width: 300px;
		/*margin: 100px auto;*/
		height: 10px;
		border-radius: 5px;
		box-shadow: inset 0 1px 2px #9d968f;
		position: relative;
	}
	.range-input input{
		-webkit-appearance: none;
		position: absolute;
		width: 100%;
		height: 5px;
		margin: 0;
		background-color: transparent;
		transform: translateY(2px);
		pointer-events: none;
	}
	.range-input input::-webkit-slider-thumb{
		-webkit-appearance: none;
		width: 17px;
		height: 17px;
		background-color: #98C787;
		border: 3px solid #cae08e;
		border-radius: 50%;
		box-shadow: inset 0 1px 2px #6f9163,
					0 0 1px #6f9163;
		pointer-events: auto;
	}
	.progress{
		position: absolute;
		height: 100%;
		left: 0;
		right: 0;
		background-image: repeating-linear-gradient(
			-45deg, #C7DB6B  0, #C7DB6B 3px,
			 #b7ca63  3px, #b7ca63  6px  
		);
		border-radius: 5px;
		background-attachment: fixed;
	}
</style>
</html>