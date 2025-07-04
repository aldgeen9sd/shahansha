

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/icons.css" />
</head>

    <div class="containerty">
        <div id="pup" class="carded">
            <img src="images/icon/videoplayer.ad.jpg" alt="تعذر تحميل الصورة">
            <h2>مرحبا بك في دليل الاطباء</h2>
            <h3> شكراً لكم للانظمام الينا.سوف يتم التواصل معاكم </h3>            
            <button class="btn-close" onclick="hide_pup()">close</button>
        </div>
    </div>
    <script>
        function show_pup() {
            document.getElementById('pup').classList.add('open');
        }

        function hide_pup() {
            document.getElementById('pup').classList.remove('open');
        }
    </script>
