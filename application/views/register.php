<html>
<head>
	<title>CA (Certificate Authority)!</title>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/icon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">
    <!-- Java Script -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</head>
<body>
<div id="login-page">
	<div class="container">
      <form id="regform" class="form-login" method="POST" action="<?php echo base_url(); ?>home/register_proses" onsubmit="return checkPass(this);">
        <h2 class="form-login-heading">Sign up now</h2>
        <div class="login-wrap">
            <input type="username" id="username" class="form-control" placeholder="Your Email" name="username" onkeyup="checkUser(); return false;" autofocus required>
            <br>
            <input type="text" id="nama" maxlength="20" class="form-control" placeholder="Your Name" name="nama" autofocus required>
            <br>
            <input type="password" name="password" id="pass1" class="form-control" placeholder="Password" onkeyup="passwordStrength(); return false;" required>
            <span style="color:green" id='result'></span>
            <br><br>
            <input type="password"  id="pass2" class="form-control" placeholder="Retype Password" onkeyup="checkPass(); return false;" required>
            <span id="confirmMessage" class="confirmMessage"></span>
            <br><br>
            <input id="submit-btn" class="btn btn-theme btn-block" href="index.html" type="submit" value="Submit">
        </div>
        </form>
	</div>
</div>

<script type="text/javascript">
    function checkUser(){
        <?php 

        ?>
    }
</script>

<script type="text/javascript">
//Check Password vaidation
    function checkPass()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field 
        //and the confirmation field
        if(pass1.value == pass2.value){
            //The passwords match. 
            //Set the color to the good color and inform
            //the user that they have entered the correct password 
            pass1.style.backgroundColor = goodColor;
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!";
            return true;
        }else{
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass1.style.backgroundColor = badColor;
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!";
            return false;
        }
    }
</script>

<script type="text/javascript">
//pass1 Strength Meter Algortihm
function passwordStrength()
{
    pass1 = $('#pass1').val();
    username = $('#username').val();
    nama = $('#nama').val();
    score = 0 ;
    //pass1 < 4
    //pass1 == username
    if (pass1.toLowerCase()==username.toLowerCase()) {
        result.innerHTML = "Bad Password!";
    }
    //pass1 length
    score += pass1.length * 4;
    score += ( checkRepetition(1,pass1).length - pass1.length ) * 1;
    score += ( checkRepetition(2,pass1).length - pass1.length ) * 1;
    score += ( checkRepetition(3,pass1).length - pass1.length ) * 1;
    score += ( checkRepetition(4,pass1).length - pass1.length ) * 1;
    //pass1 has 3 numbers
    if (pass1.match(/(.*[0-9].*[0-9].*[0-9])/))  score += 5;
    //pass1 has 2 sybols
    if (pass1.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/)) score += 5; 
    //pass1 has Upper and Lower chars
    if (pass1.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  score += 10; 
    //pass1 has number and chars
    if (pass1.match(/([a-zA-Z])/) && pass1.match(/([0-9])/))  score += 15 ;
    //pass1 has number and symbol
    if (pass1.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && pass1.match(/([0-9])/))  score += 15 ;
   //pass1 has char and symbol
    if (pass1.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && pass1.match(/([a-zA-Z])/))  score += 15 ;
    //pass1 is just a nubers or chars
    if (pass1.match(/^\w+$/) || pass1.match(/^\d+$/) )  score -= 10 ;
    //verifing 0 < score < 100
    if (pass1.toLowerCase()==username.toLowerCase()) {
        //result.innerHTML = "Bad Password!";
        score = 0;
    }
    if (pass1.toLowerCase()==nama.toLowerCase()) {
        //result.innerHTML = "Bad Password!";
        score = 0;
    }
    if ( score < 0 )  score = 0 ;
    if ( score > 100 )  score = 100 ;
    if (score < 25 )  {
        result.innerHTML = "Bad Password!";
    }
    if (score > 24 && score < 55 )  {
        result.innerHTML = "Good Password!";
    }
    if (score > 54) {
        result.innerHTML = "Strong Password!";
    }
}
function checkRepetition(pLen,str) {
    res = ""
    for ( i=0; i<str.length ; i++ ) {
        repeated=true
        for (j=0;j < pLen && (j+i+pLen) < str.length;j++)
            repeated=repeated && (str.charAt(j+i)==str.charAt(j+i+pLen))
        if (j<pLen) repeated=false
        if (repeated) {
            i+=pLen-1
            repeated=false
        }
        else {
            res+=str.charAt(i)
        }
    }
    return res
}
</script>


</body>
</html>