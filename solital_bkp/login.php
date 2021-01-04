

<!-- make sure the attribute enctype is set to multipart/form-data -->
<form method="post" action="<?= url('parametros'); ?>" enctype="multipart/form-data">
<input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
    <!-- upload of a single file -->
    <p>
        <label>Add file (single): </label><br/>
        <input type="file" name="file_up"/>
    </p>

    <!-- multiple input fields for the same input name, use brackets
    <p>
        <label>Add files (up to 2): </label><br/>
        <input type="file" name="example2[]"/><br/>
        <input type="file" name="example2[]"/>
    </p>-->

    <p>
       <button type="submit">Enviar</button>
    </p>
</form>