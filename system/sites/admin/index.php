<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Key</th>
            <!--<th>Inhalt</th>-->
            <th>Bearbeiten</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($controller->cms_contents as $cms_content) {
        ?>
            <tr>
                <td><? echo $cms_content->id; ?></td>
                <td><? echo $cms_content->title; ?></td>
                <td><? echo $cms_content->cms_key; ?></td>
                <!--<td><pre><? echo $cms_content->content; ?></pre></td>-->
                <td><? link_to('bearbeiten', 'admin', 'edit', Array(Array('id', $cms_content->id))); ?></td>
            </tr>
        <? } ?>
    </tbody>
</table>