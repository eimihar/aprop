<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="<?php echo $template->get('title');?>">
    <meta name="description" content="<?php echo $template->get('description');?>">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script src="/js/tether.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
    <title>Casa Idaman | <?php echo $template->get('title');?></title>
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

        #top-nav .top-nav-menu a {
            background: #5c5c5c;
            padding: 10px;
            font-size: 1.1em;
            color: #dadada;
        }

        #top-nav .top-nav-menu {
            text-align: right;
        }

        .top-nav-toggler {
            display: none;
        }

        .content-header {
            background: #5c5c5c;
            color: #eeeeee;
        }

        @media screen and (max-width: 840px) {
            #top-nav .top-nav-menu{
                display: none;
            }

            .top-nav-toggler {
                display: block;
                padding-top: 5px;
            }

            .top-nav-toggler a {
                font-size: 1.1em;
                padding: 10px;
                background: #a2a2a2;
                color: white;
            }

            .top-nav-menu {
                padding-top: 5px;
            }

            .top-nav-menu a {
                display: block;
                margin-bottom: 5px;
                font-size: 30px !important;
            }
        }
    </style>
    <script type="text/javascript">
        var ci = new function()
        {
            this.showMenu = function()
            {
                $('.top-nav-menu').toggle();
            };
        };
    </script>
</head>
<body>
<div class="container" style="margin-top: 30px;">
    <div id="top-nav" style="background: grey;">
        <div class="top-nav-toggler"><a onclick="ci.showMenu();" href="javascript:;"><span class="fa fa-list"></span> Menu</a></div>
        <div class="top-nav-menu">
            <a href="<?php echo $url->frontend();?>"><span class="fa fa-home"></span> Utama</a>
            <a href="<?php echo $url->route('@web.projects');?>"><span class="fa fa-list-ol"></span> Senarai Project Perumahan</a>
            <a href="<?php echo $url->route('@web.contact');?>"><span class="fa fa-phone"></span> Hubungi Kami</a>
        </div>
    </div>
    <div class="row">
        <div class="jumbotron content-header" style="/*background: #373737; color: white; */position: relative; padding-top: 20px; padding-bottom: 20px;">
            <h1><span class="fa fa-home"></span> <?php echo $template->get('title');?></h1>
            <p><?php echo $template->get('description');?></p>
        </div>
        <div class="col-sm-12" id="container-content"><?php echo $template->render();?></div>
    </div>
</div>
    <div style="text-align: center; font-size: 0.9em; padding: 10px 0 10px 0; border-top: 1px solid #fafafa; color: #9f9f9f;">
        Hakmilik terpelihara CasaIdaman <?php echo date('Y');?>
    </div>
</body>
</html>