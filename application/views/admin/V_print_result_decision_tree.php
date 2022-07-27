<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Mustahik <?=$data_mustahik->nama;?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <img class="img-profile rounded-circle " src="<?=base_url();?>assets1/img/LMI.jpg" style="position:absolute; width:60px; height:60px;">
    <div class="text-center"><h4>Lembaga Manajemen Infaq</h4></div>
    <div class="text-center w-75 mx-auto"><span style="font-size: 12px;">Gedung Sehati, Jl. Barata Jaya XXII No.20, Baratajaya, Kec. Gubeng, Kota Surabaya, Jawa Timur<br>Kode pos 60284</span></div>
    <hr style="border: 0; border-style:inset; border-top:1px solid #000">
    <div class="text-center"><h5>Hasil Uji Coba Pohon Keputusan</h5></div>
    <table class='table table-bordered'>
        <thead class="table-dark">
            <th>No</th>
            <th>Nama</th>
            <th>Pekerjaan</th>
            <th>Penghasilan</th>
            <th>Pengeluaran</th>
            <th>Jumlah Tanggungan</th>
            <th>Keputusan Asli</th>
            <th>Keputusan Hasil</th>
            <th>Id Rule</th>
            <th>Ketepatan</th>
        </thead>
        <tbody>
            <?= $result; ?>
        </tbody>
    </table>
</body>
<script type="text/php">
    if ( isset($pdf) ) {
        $x = 810;
        $y = 10;
        $text = "{PAGE_NUM} of {PAGE_COUNT}";
        $font = $fontMetrics->get_font("helvetica", "bold");
        $size = 8;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>