<html>
<head>


</head>
<body>
<table border=0 >
<tr height="350px" valign="top">

<td>
<ul class="tabs" align="Center">
        <li>
          <input type="radio" checked name="tabs" id="tab1">
          <label for="tab1">Expense</label>
          <div id="tab-content1" class="tab-content animated fadeIn">
			<table width="100%"><tr class="tableheader" width=100%><td style="color:#FFFFFF; height:35px; width:100%; border-radius: 10px;"></td>
			</tr>
			<tr><td><?php include 'MainTab/LocalTab2.php';?></td></tr>
			<tr height=10px><td><br></td></tr>
			<tr class="tableheader"><td style="color:#FFFFFF;height:35px; top:10px; border-radius: 5px;"></td>
			</tr>
			</table>
			<input type="hidden" name="tab1">
          </div>
        </li>
        <li>
          <input type="radio" name="tabs" id="tab2">
          <label for="tab2">Transport</label>
          <div id="tab-content2" class="tab-content animated fadeIn">
            <table border=0 width="100%" ><tr class="tableheader" width=100%><td style="color:#FFFFFF; height:35px; width:100%;"></td>
			</tr>
			<tr><td><?php include 'MainTab/Transport.php';?></td></tr>
			<tr class="tableheader"><td style="color:#FFFFFF; height:35px; width:100%;"></td>
			</tr>
			</table>
			<input type="hidden" name="tab2">
          </div>
        </li>
		<li>
          <input type="radio" name="tabs" id="tab3">
          <label for="tab3">Meal</label>
          <div id="tab-content3" class="tab-content animated fadeIn">
            <table border=0 width="100%" >
			<tr class="tableheader" width=100%><td style="color:#FFFFFF; height:35px; width:100%;"></td>
			</tr>
			<tr><td><?php include 'MainTab/FoodTab.php';?></td></tr>
			<tr class="tableheader" width=100%><td style="color:#FFFFFF; height:35px; width:100%;"></td>
			</tr>
			</table>
			<input type="hidden" name="tab3">
          </div>
        </li>
		<li>
          <input type="radio" name="tabs" id="tab4">
          <label for="tab4">Hotel</label>
          <div id="tab-content3" class="tab-content animated fadeIn">
            <table border=0 width="100%" >
			<tr class="tableheader" width=100%><td style="color:#FFFFFF; height:35px; width:100%;"></td>
			</tr>
			<tr><td><?php include 'MainTab/HotelTab.php';?></td></tr>
			<tr class="tableheader" width=100%><td style="color:#FFFFFF; height:35px; width:100%;"></td>
			</tr>
			</table>
			<input type="hidden" name="tab4">
          </div>
        </li>
		<li>
          <input type="radio" name="tabs" id="tab5">
          <label for="tab5">Other</label>
          <div id="tab-content6" class="tab-content animated fadeIn">
            <table border=0 width="100%" >
			<tr class="tableheader" width=100%><td style="color:#FFFFFF; height:35px; width:100%;"></td>
			</tr>
			<tr><td><?php include 'MainTab/OtherTab.php';?></td></tr>
			<tr class="tableheader" width=100%><td style="color:#FFFFFF; height:35px; width:100%;"></td>
			</tr>
			</table>
			<input type="hidden" name="tab5">
          </div>
        </li>
</ul>
<br><br>
</td>
</tr>
</table>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</body>
</html>