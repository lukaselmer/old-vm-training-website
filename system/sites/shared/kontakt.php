<? $title = "Kontakt"; ?>

<?
if ($error) {
    echo "<p><i><b>$error</b></i></p>";
}
?>

<? if (strlen($contact_content->content) > 0) {
?>
    <div style="height: 4px; width: 10px;"></div>
    <div class="player rounded">
        <div class="inner">
            <div class="fl" style="width: 700px;"><? echo htmlspecialchars_decode($contact_content->content); ?></div>
        <? clearer(); ?>
    </div>
</div>
<? }
?>

    <form action="<? echo url_for('home', 'contact'); ?>" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Ihr Name (min. 4 Zeichen):</td>
                <td><input type="text" name="name" value="<? echo $_REQUEST['name']; ?>" /></td>
            </tr>
            <tr>
                <td>Ihre Email-Adresse (gültige Email):</td>
                <td><input type="text" name="email" value="<? echo $_REQUEST['email']; ?>" /></td>
            </tr>
            <tr>
                <td>Betreff (min. 4 Zeichen):</td>
                <td><input type="text" name="subject" value="<? echo $_REQUEST['subject']; ?>" /></td>
            </tr>
            <tr>
                <td>Nachricht (min. 10 Zeichen):<br></td>
                <td><textarea cols="40" rows="10" name="message"><? echo $_REQUEST['message']; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Senden" name="submit" />
                </td>
            </tr>
        </table>
        <input type="hidden" name="send" value="1" />
</form>
