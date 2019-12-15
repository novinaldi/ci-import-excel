<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Excel ke Database MySQL | Create by Novinaldi</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/jquery.form.js') ?>"></script>
</head>

<body>
    <h2>Import Ke-Excel</h2>
    <hr>
    <a href="<?= base_url('assets/examplefile/examplefile.xlsx') ?>">Download Template File Excel</a>
    <div class="pesan" style="display: none;"></div>
    <?= form_open_multipart('welcome/doimport', ['class' => 'formimport']) ?>
    <table border="0">
        <tr>
            <td>
                Import File Excel
            </td>
            <td>
                <input type="file" name="uploadfile" accept=".xls,.xlsx">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btnimport">Import</button>
                <button type="button" class="btnreload" style="display: none;">Reload</button>
            </td>
        </tr>
    </table>
    <?= form_close(); ?>

    <script>
    $(document).ready(function(e) {
        $('.formimport').ajaxForm({
            // dataType: 'json',
            beforeSend: function() {
                $('.btnimport').attr('disabled', 'disabled');
                $('.btnimport').html('Tunggu Sedang di Proses...');
            },
            success: function(data) {
                $('.pesan').fadeIn('slow');
                $('.pesan').html(data);
            },
            complete: function() {
                $('.btnimport').removeAttr('disabled');
                $('.btnimport').html('Import');
                $('.btnreload').fadeIn('slow');
            },
            error: function(e) {
                alert(e);
            }
        });

        $('.btnreload').click(function(e) {
            window.location.reload();
        });
    });
    </script>
</body>

</html>