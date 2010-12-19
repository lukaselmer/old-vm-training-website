<? $cms_content = $controller->cms_content ?>
<? include "_tiny_mce_code.php" ?>

<form name="cms_content" action="<? echo url_for('admin', 'update_cms_content', Array('id' => $cms_content->cms_key)); ?>" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Inhalt bearbeiten</legend>
        <p>
            <label for="cms_content[title]">Titel</label>
            <input type="text" id="cms_content[title]" name="cms_content[content]" value="<? echo $cms_content->title; ?>" />
        </p>
        <p>
            <label for="cms_content[content]">Inhalt</label>
            <textarea id="cms_content[content]" name="cms_content[content]" rows="8" cols="20"><? echo $cms_content->content; ?></textarea>
        </p>

        <input type="submit" value="Speichern" name="save" />
    </fieldset>
</form>
