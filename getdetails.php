<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Details</title>
<link rel="stylesheet" type="text/css" href="css/style.css"  />
<?php
    $mail = $_POST['email'];
    $con = mysql_connect('localhost','itrixpv1','itrixceg');
    mysql_select_db('itrixpv1_users',$con);
	//echo "SELECT * FROM registeredusers JOIN w_bigdata ON registeredusers.email = w_bigdata.email WHERE email = '".$mail."'";
    $bigdata_res = mysql_query("SELECT * FROM registeredusers JOIN w_bigdata ON registeredusers.email = w_bigdata.email WHERE w_bigdata.email = '".$mail."'");
	$cyber_res = mysql_query("SELECT * FROM registeredusers JOIN w_cyberforensics ON registeredusers.email = w_cyberforensics.email WHERE w_cyberforensics.email = '".$mail."'");
	$windows_res = mysql_query("SELECT * FROM registeredusers JOIN w_win8appdev ON registeredusers.email = w_win8appdev.email WHERE w_win8appdev.email = '".$mail."'");
    	$workshop=array("bigdata"=>false,"win8"=>false,"cyber"=>false);
?>
</head>

<body>
    	<div class="heading">
        	<h1>
            	PDF Generator
            </h1>
        </div>
        <div class="bigdata">
            	<?php
					if(!$bigdata_res || mysql_num_rows($bigdata_res)==0)
    					echo "No Records Found.";
				    else
					{
						echo "<table bordercolor='#000'>";
	    				while($row = mysql_fetch_array($bigdata_res))
    					{
							$name=$row['name'];
							$email=$row['email'];
							$phone=$row['phonenumber'];
							$college=$row['organisationname'];
							$workshop["bigdata"]=true;
							echo "<tr><td>Name</td><td>".$row['name']."</td></tr>";
    						echo "<tr><td>Phone</td><td>".$row['phonenumber']."</td></tr>";
    						echo "<tr><td>Organisation Name</td><td>".$row['organisationname']."</td></tr>";
    						echo "<tr><td>Email</td><td>".$row['email']."</td></tr>";
    						echo "<tr><td>Bank</td><td>".$row['bank']."</td></tr>";
    						echo "<tr><td>Branch</td><td>".$row['branch']."</td></tr>";
    						echo "<tr><td><b>DD Number</b></td><td><b>".$row['ddnumber']."</b></td></tr>";
    						echo "<tr><td><b>Amount</b></td><td><b>".$row['amount']." INR</b></td></tr>";
    						echo "<tr><td>ITrix ID</td><td>".$row['itrixid']."</td></tr>";
    						echo "<tr><td><b>Workshop</b></td><td><b>Big Data</b></td></tr>";
    					}
						echo "</table>";
					}
				?>
        </div>
        <div class="windows">
            	<?php
					if(!$windows_res || mysql_num_rows($windows_res)==0)
    					echo "No Records Found.";
				    else
					{
						echo "<table bordercolor='#000'>";
	    				while($row = mysql_fetch_array($windows_res))
    					{
							$name=$row['name'];
							$email=$row['email'];
							$phone=$row['phonenumber'];
							$college=$row['organisationname'];
							$workshop["win8"]=true;
							echo "<tr><td>Name</td><td>".$row['name']."</td></tr>";
    						echo "<tr><td>Phone</td><td>".$row['phonenumber']."</td></tr>";
    						echo "<tr><td>Organisation Name</td><td>".$row['organisationname']."</td></tr>";
    						echo "<tr><td>Email</td><td>".$row['email']."</td></tr>";
    						echo "<tr><td>Bank</td><td>".$row['bank']."</td></tr>";
    						echo "<tr><td>Branch</td><td>".$row['branch']."</td></tr>";
    						echo "<tr><td><b>DD Number</b></td><td><b>".$row['ddnumber']."</b></td></tr>";
    						echo "<tr><td><b>Amount</b></td><td><b>".$row['amount']." INR</b></td></tr>";
    						echo "<tr><td>ITrix ID</td><td>".$row['itrixid']."</td></tr>";
    						echo "<tr><td><b>Workshop</b></td><td><b>Windows 8 App Development</b></td></tr>";
    					}
						echo "</table>";
					}
				?>
        </div>
        <div class="cyberforensics">
            	<?php
					if(!$cyber_res || mysql_num_rows($cyber_res)==0)
    					echo "No Records Found.";
				    else
					{
						echo "<table bordercolor='#000'>";
	    				while($row = mysql_fetch_array($cyber_res))
    					{
							$name=$row['name'];
							$email=$row['email'];
							$phone=$row['phonenumber'];
							$college=$row['organisationname'];
							$workshop["cyber"]=true;
							echo "<tr><td>Name</td><td>".$row['name']."</td></tr>";
    						echo "<tr><td>Phone</td><td>".$row['phonenumber']."</td></tr>";
    						echo "<tr><td>Organisation Name</td><td>".$row['organisationname']."</td></tr>";
    						echo "<tr><td>Email</td><td>".$row['email']."</td></tr>";
    						echo "<tr><td>Bank</td><td>".$row['bank']."</td></tr>";
    						echo "<tr><td>Branch</td><td>".$row['branch']."</td></tr>";
    						echo "<tr><td><b>DD Number</b></td><td><b>".$row['ddnumber']."</b></td></tr>";
    						echo "<tr><td><b>Amount</b></td><td><b>".$row['amount']." INR</b></td></tr>";
    						echo "<tr><td>ITrix ID</td><td>".$row['itrixid']."</td></tr>";
    						echo "<tr><td><b>Workshop</b></td><td><b>Cyber Forensics</b></td></tr>";
    					}
						echo "</table>";
					}
				?>
        </div>
        <div class="form">
        	<form class="details" action="pdf.php" method="post">
        		Name:<input class="field" type="text" name="name" value=<?php echo "'".$name."'"; ?> />
        		Phone:<input class="field" type="text" name="phone" value=<?php echo "'".$phone."'"; ?> />
        		Organisation:<input class="field" type="text" name="college" value=<?php echo "'".$college."'"; ?> />
        		EMail:<input class="field" type="text" name="email" value=<?php echo "'".$email."'"; ?> />
                Workshop Registered:
                <input type="checkbox" name="bigdata" value="Big Data" <?php if($workshop['bigdata']) echo "checked='checked'"; ?> />Big Data
                <input type="checkbox" name="win8" value="Windows 8 App Developement" <?php if($workshop['win8']) echo "checked='checked'"; ?> />Windows 8 App Development
                <input type="checkbox" name="cyber" value="CyberForensics and Information Security" <?php if($workshop['cyber']) echo "checked='checked'"; ?> />CyberForensics and Information Security
        		<input class="button" type="submit" name="submit" value="Generate"/>
            </form>
        </div>
</body>
</html>
