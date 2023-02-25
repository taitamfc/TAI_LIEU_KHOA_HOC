<?php
    $term_id = $tag->term_id;
    $image = get_term_meta($term_id,'image',true);
?>
<tr class="form-field">
    <th>Ảnh</th>
    <td>
        <input name="image" id="image" type="text" value="<?= $image; ?>" size="40">
    </td>
</tr>