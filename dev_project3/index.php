<!DOCTYPE HTML>
<html lang="en-US">

<head>
<title>ADITYA LOGISHETTY</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="description" 
                content="A sample resume of my professional technical skills and background">
<meta name="keywords" 
                content="charset, content, http-equiv, itemprop, name, property,resume, porfolio, cover letter, skills, education, academic, experience, gpa, university,interview, job, search, career, professional, download">
<meta name="author" 
               content="ADITYA LOGISHETTY">
<link rel="stylesheet"  type="text/css" href="css.css">


<script>
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>

function home(){
	document.getElementById("content").src="home.php";	
}
function bio(){
	document.getElementById("content").src="bio.php";
	
}
function resume(){
	document.getElementById("content").src="resume.php";
	
}
function contact(){
	document.getElementById("content").src="contact.php";
	
}
</script>
</head>
<body>

<nav>
<ul>
  <li><a href="#" class ="home1" onclick = "home()">Home</a>
  <li><a href="#" class ="bio1" onclick = "bio()">Bio</a>
  <li><a href="#" class ="resume1" onclick = "resume()">Resume</a>
  <li><a href="#" class ="contact1" onclick = "contact()">Contact</a>
</ul>
</nav>
<br>
<iframe id ="content" src="home.php" width="1350" height="550">
</iframe>
<footer>
<p>Copyright &copy;    AdityaLogishetty.com</p>
</footer>
</body>
</html>