<h1><? echo $cms_content->title ?></h1>
<? echo htmlspecialchars_decode($cms_content->content) ?>
<? if (is_authenticated ()) {
?>
    <div style="background: #eee; padding: 6px 15px; font-weight: bold; margin: 15px 0 15px 0;"><?
    link_to('Inhalt bearbeiten', 'admin', 'edit', Array(
        Array('id', $cms_content->id),
        Array('redirect_to_action', $_REQUEST['action']))); ?></div>
<? } ?>