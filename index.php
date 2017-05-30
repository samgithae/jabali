<?php
$dbfile = 'functions/db.php';
if (!file_exists($dbfile)) {
	header("Location: setup?module=app");
}
include 'header.php';
$year = date("Y");
$month = date("m");
$day = date("d");
$directory = "uploads/$year/$month/$day/";

if (!is_dir($directory)) {
	mkdir($directory, 755, true);
}

if (isset($_GET['article'])) {
	if ($_GET['article'] == "articles") {
		$hArticle -> getArticles();
	} else {
		$hArticle -> getArticleCode($_GET['article']);
	}
} else { ?>
	<title>Access Your Health [ <?php getOption('name'); ?> ]</title>
	<div style="padding-top:40px; class="mdl-color--<?php if (isset($_SESSION['myCode'])) {
            primaryColor($_SESSION['myCode']);
        } else { echo "teal";}  ?>">
	    <div id="login_div">
		<center><a href="<?php echo hROOT; ?>"><img src="<?php echo hIMAGES; ?>logo.png" width="300px;"></a><br>
	    <a href="./register" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored">
	  <i class="material-icons">edit</i> REGISTER</a> <a href="./login" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored">
	  <i class="material-icons">exit_to_app</i> LOGIN</a>
	  <p>© JABALI 2017 - All Rights Reserved</p>
	  <a href="./about">About</a> - <a href="./tos">TOS</a> - <a href="./faq">FAQs</a>
		</center><br>
	    </div>
	</div> 
<?php }
include 'footer.php';
?>