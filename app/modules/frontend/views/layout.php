<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script src="/js/tether.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
    <?php if($template->has('title')):?>
        <title><?php echo $template->get('title');?></title>
    <?php else:?>
        <title>Agent 701 : Semak Hartanah</title>
    <?php endif;?>
    <style type="text/css">
        body {
            background: #fafafa;
        }
        
        .container {
            background: white;
            margin-bottom: 30px;
            padding-bottom: 50px;
        }
        * {
            font-family: Tahoma;
        }
        #top-nav a {
            background: #eceeef;
            padding: 10px;
            font-size: 1.1em;
            color: #808080;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 30px;">
    <div id="top-nav" style="text-align: right; background: grey;">
        <a href="<?php echo $url->frontend();?>"><span class="fa fa-home"></span> Utama</a>&nbsp;
        <a href="<?php echo $url->route('@web.projects');?>"><span class="fa fa-list-ol"></span> Senarai Project Perumahan</a>&nbsp;
        <a href="<?php echo $url->route('@web.contact');?>"><span class="fa fa-phone"></span> Hubungi Kami</a>
    </div>
    <div class="row">
        <div class="jumbotron" style="/*background: #373737; color: white; */position: relative; padding-top: 20px; padding-bottom: 20px;">
            <h1><span class="fa fa-home"></span> <?php echo $template->get('title', 'Perumahan Tanpa Deposit');?></h1>
            <p><?php echo $template->get('description', 'Semak gaji dan kelayakan dengan percuma');?></p>
        </div>
        <div class="col-sm-12" id="container-content"><?php echo $template->render();?></div>
    </div>
</div>
    <div style="text-align: center; font-size: 0.9em; padding: 10px 0 10px 0; border-top: 1px solid #fafafa; color: #9f9f9f;">
        Hakmilik terpelihara CasaIdaman <?php echo date('Y');?>
    </div>
</body>
</html>