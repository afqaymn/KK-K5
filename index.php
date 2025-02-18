<!--membuat sambungan ke db-->
<?php
 include('config.php');
?>

<html>
	<head>
	<title>Senarai Suhu</title>
	</head>
	<style>
	h1 {
		text-align: center;
		padding-top: 20px;
		color: white;
	}
	h2 {
		text-align: center;
		padding-top: 20px;
		color: white;
	}
	body {
		background-color: 6A1E55;
	}
	</style>
	<body>
	<h1 id="tajuk" onmouseover="biru()"onmouseout="hitam()">Selamat Datang ke Syarikat Mentari</h1>
	<div style="width: 80%; margin: 20 auto; text-align: center; ">
	<img id="banner" src="gambar1.png" onmouseover="banner2()" onmouseout="banner1()" style="border-radius: 0px; width:750px;height:350px;">
	</div>
	<h2>SENARAI SUHU STAF</h2>
	<center>
	<table border=1 cellpadding=5 cellspacing=0 bgcolor=white>
		<tr>
		<th>NO KAD PENGENALAN</th>
		<th>NAMA STAF</th>
		<th>JABATAN</th>
		<th>SUHU</th>
		<th>TINDAKAN</th>
		</tr>
	  
		<!--memaparkan rekod staf-->
		<?php
			$query=mysqli_query($con,"SELECT * FROM jadual_suhu");
			if(mysqli_num_rows($query)>0){
				while($row=mysqli_fetch_array($query)){
					echo"
					<tr>
						<td align='center'>".$row['noic']."</td>
						<td align='center'>".$row['nama']."</td>
						<td align='center'>".$row['jabatan']."</td>
						<td align='center'>".$row['suhu']."</td>
						<td align='center'><a href='padam.php?noic=".$row['noic']."' onclick='yesno()'>Padam</a></td>
					</tr>
					";
				}
			}
		?>







	</table>
	<p><a href="tambah.php"><button name='tambah'type="submit">&#43; Tambah rekod</button></a></p>
	<p>	
	<button onmouseup="tekan()"onmousedown="lepas()">HUBUNGI</button>
	<p id="hubungi"></p>
	</center>
	<script>
		function banner2(){
			document.getElementById("banner").src="gambar2.png";
		}
		function banner1(){
			document.getElementById("banner").src="gambar1.png";
		}
		function biru(){
			document.getElementById("tajuk").style.color="blue";
			document.getElementById("tajuk").style.fontFamily="Time New Roman";
		}
		function hitam(){
			document.getElementById("tajuk").style.color="black";
			document.getElementById("tajuk").style.fontFamily="Arial";
		}
		function tekan(){
			document.getElementById("hubungi").innerHTML="syarikat mentari@gmail.com";
		}
		function lepas(){
			document.getElementById("hubungi").innerHTML="017 389 3447";
		}
		function yesno(){
            confirm("Adakah anda yakin ingin memadam data tersebut");
        }
       
	</script>
		
	
	</body>
</html>
