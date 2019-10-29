<?php session_start(); ?>

<html>
	<head>
	
	</head>
	
	<body>


	<form action="Personal-Information.php" method="post">



	<table align='center' width='80%' border='0' cellpadding='10' cellspacing="1">
			<tr>
			
				<td width='80%'>
					<h4>Account Control Panel</h4> <hr/>
					<table width="80%" border="1" cellspacing="0" cellpadding="5">
						<tr>
							<td>
								Name* &nbsp &nbsp &nbsp &nbsp
								<input type="text" value="<?echo "$_SESSION[name]"?>"><br/><br/>

								Gender* &nbsp &nbsp &nbsp &nbsp  &nbsp
								<select>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								<br/>
								<br/>

								Current Email &nbsp &nbsp
								<input type="text" name="txt" value="<? echo "$_SESSION[email]" ?>" disabled><br/><br/>
								
								New Email &nbsp &nbsp &nbsp &nbsp 
								<input type="text" name="txt"><br/><br/>

								<button type="submit" value="submt">Save</button> <br/>
								
								
							</td>
						
						</tr>
					</table>
						
				</td>
			</tr>
	
		</table>

	</form>
	
	
	</body>



</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	


	//header('Location: userHome.php');
}

?>