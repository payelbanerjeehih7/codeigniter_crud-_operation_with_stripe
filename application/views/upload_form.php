<!-- application/views/upload_form.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CSV File Upload</title>
</head>

<body>

    <h2>CSV File Upload</h2>

    <?php echo form_open_multipart('csv_import/upload_csv'); ?>

    <input type="file" name="userfile" size="20" />

    <br /><br />

    <input type="submit" value="Upload" />

    </form>

</body>

</html>