<? $ln = $_REQUEST['ln']; ?>
<h3><? echo $ln == 'de' ? 'Kontaktformular' : 'Contact Form' ?></h3>

<?
if ($_REQUEST['send_success']) {
    echo "<p><i><b>" . ($ln == 'de' ? "Nachricht wurde erfolgreich gesendet" : "Message sent sucessfully") . ".</b></i></p>";
} else {
    if ($_REQUEST['error']) {
        echo "<p><i><b>" . $_REQUEST['error'] . "</b></i></p>";
    }
?>

    <form action="<? echo url_for('home', 'kontakt'); ?>" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><? echo $ln == 'de' ? 'Vorname' : 'First Name' ?></td>
                <td><input type="text" name="first_name" value="<? echo $_REQUEST['first_name']; ?>" /></td>
            </tr>
            <tr>
                <td><? echo $ln == 'de' ? 'Nachname' : 'Last Name' ?></td>
                <td><input type="text" name="last_name" value="<? echo $_REQUEST['last_name']; ?>" /></td>
            </tr>
            <tr>
                <td><? echo $ln == 'de' ? 'Strasse' : 'Street' ?></td>
                <td><input type="text" name="street" value="<? echo $_REQUEST['street']; ?>" /></td>
            </tr>
            <tr>
                <td><? echo $ln == 'de' ? 'Ort / PLZ' : 'Place / ZIP' ?></td>
                <td><input type="text" name="place" value="<? echo $_REQUEST['place']; ?>" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<? echo $_REQUEST['email']; ?>" /></td>
            </tr>
            <tr>
                <td><? echo $ln == 'de' ? 'Telefon oder Mobiltelefon' : 'Phone / Mobile Phone' ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><input type="text" name="phone" value="<? echo $_REQUEST['fixed_phone']; ?>" /></td>
            </tr>
            <tr>
                <td><? echo $ln == 'de' ? 'Betreff' : 'Subject' ?></td>
                <td><input type="text" name="subject" value="<? echo $_REQUEST['subject']; ?>" /></td>
            </tr>
            <tr>
                <td><? echo $ln == 'de' ? 'Trainingswünsche' : 'Training Wishes' ?><br></td>
                <td><textarea cols="40" rows="10" name="training_wishes"><? echo $_REQUEST['training_wishes']; ?></textarea></td>
            </tr>
            <tr>
                <td><? echo $ln == 'de' ? 'Bemerkungen' : 'Remarks' ?><br></td>
                <td><textarea cols="40" rows="10" name="remarks"><? echo $_REQUEST['remarks']; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="<? echo $ln == 'de' ? 'Anfrage Senden' : 'Send Request' ?>" name="submit" />
                </td>
            </tr>
        </table>
        <input type="hidden" name="send" value="1" />
    </form>
    <br/><br/>
<? } ?>
