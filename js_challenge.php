<?php
function challenge()
{
    $key = 'dkfjneki4o3f3f'; //Change this to some random characters
    session_start();
    if (!isset($_SESSION['_authorized'])) {
        if (isset($_POST['_authorized'])) {
            if (sha1(substr(time(), 0, 9) . $_SERVER['HTTP_USER_AGENT'] . $key) != $_POST['_authorized']) {
                die('Access denied');
            } else {
                $_SESSION['_authorized'] = '';
            }
        } else {
            echo '
<form method="post">
<button type="submit" name="_authorized" style="display: none" id="_authorized" value="' . sha1(substr(time(), 0, 9) . $_SERVER['HTTP_USER_AGENT'] . $key) . '"/>
</form>
<script>
document.getElementById("_authorized").click();
</script>
';
            die;
        }
    }
}
challenge();