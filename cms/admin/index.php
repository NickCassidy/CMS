<?php
//kill session
session_destroy('settings');
?>

<html>
    <head>
        <link href="../css/general.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <h1>Manage Content</h1>	

<hr>

<script>
function clearButtons(){
var inputs = document.getElementsByTagName("input");
for(var i = inputs.length-1;i>=0;i--){
    if(inputs[i].getAttribute("type")==="radio"){
        inputs[i].checked=false;
        }
    }
}
</script>
<input id="clickMe" type="button" value="Reset all radio buttons" onclick="clearButtons()" /><br />

<hr>     

        <h2>Create new website page</h2>
            <form action="createSession.php" method="get">
                <input type="radio" name="pagetype" value="portfolio">Portfolio<br />
                <input type="radio" name="pagetype" value="portrait">Portrait<br />
                <input type="radio" name="pagetype" value="poster">Poster<br />
                <input type="radio" name="pagetype" value="archive">Archive<br />
                <input type="radio" name="pagetype" value="ella">Ella<br /><br />
                <input type="submit" value="Create new page">
            </form>

        <h2>Quicklinks</h2>
        <ul>
            <li><a href="../portfolio" target="_blank">Portfolio</a></li>
            <li><a href="../portrait" target="_blank">Portrait</a></li>
            <li><a href="../poster" target="_blank">Poster</a></li>
            <li><a href="../archive" target="_blank">Archive</a></li>
            <li><a href="../ella" target="_blank">Ella</a></li>
            <li><a href="../" target="_blank">Home</a></li>
        </ul>    

<h2>Edit a live page</h2>
            <form action="preview/liveToPreview.php" method="get">
                <input type="radio" name="pagetype" value="portfolio">Portfolio<br />
                <input type="radio" name="pagetype" value="portrait">Portrait<br />
                <input type="radio" name="pagetype" value="poster">Poster<br />
                <input type="radio" name="pagetype" value="archive">Archive<br />
                <input type="radio" name="pagetype" value="ella">Ella<br /><br />
                <input type="submit" value="Edit live page">
            </form>

        <h2>Reset live</h2>
         <p>This will delete all content from the selected webpage</p>
            <form action="dropTablesAndAllFiles.php" method="get">
                <input type="radio" name="pagetype" value="portfolio">Portfolio<br />
                <input type="radio" name="pagetype" value="portrait">Portrait<br />
                <input type="radio" name="pagetype" value="poster">Poster<br />
                <input type="radio" name="pagetype" value="archive">Archive<br />
                <input type="radio" name="pagetype" value="ella">Ella<br /><br />
                <input type="submit" value="Reset page">
            </form>
<hr>

        <h2>Client pages</h2>
        <a href="clientList.php">VIEW LIST OF CLIENT PAGES</a><br />

        <h2>Create a new client page</h2>
        <p>Enter client name</p>
            <form action="createSessionNewClientPage.php" method="get">
                <input type="text" name="pagetype" value="">
                <input type="submit" value="Create new page">
            </form>

<!--    <h2>Edit client page</h2>
            <form action="preview/liveToPreviewClient.php" method="get">
                <select name="pagetype">
                <option selected="selected">Choose client</option>
                    <?php
                    require 'clientFormDropdown.php';
                    ?>
                <input type="Submit" value="Edit page">
                </select>
            </form><br />
-->            

        <h2>Delete client page</h2>
            <form action="dropClientTablesAndAllFiles.php" method="get">
                <select name="clientName">
                <option selected="selected">Choose client</option>
                    <?php
                    require 'clientFormDropdown.php';
                    ?>
                <input type="Submit" value="Delete client page">
                </select>
            </form><br />
<hr>
        <h2>Homepage images</h2> 
        <a href="dropzone/indexRandom.php">UPLOAD IMAGES</a><br /><br />
         <h2>View images</h2>
        <a href="homepageImages/listRandomImages.php">VIEW LIST OF HOMEPAGE PAGES</a><br />

    </body>
</html>