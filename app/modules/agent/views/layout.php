<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="/js/jquery.min.js"></script>
<!--        <script type="text/javascript" src="/js/bootstrap.min.js"></script>-->
        <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
        <?php if($template->has('title')):?>
            <title><?php echo $template->get('title');?></title>
        <?php else:?>
            <title>Agent 701 : Semak Hartanah</title>
        <?php endif;?>
    </head>
    <body>
        <div class="container" style="padding-top: 20px;">
            <div class="header">
                <strong>Welcome back!</strong>
                <span class="pull-right">
                    <a href="<?php echo $url->admin('inquiries');?>">Inquiries</a> |
                    <a href="<?php echo $url->admin('projects');?>">Projects</a> |
                    <a href="<?php echo $url->admin('auth', 'logout');?>">Logout</a>
                </span>
            </div>
        </div>
        <div class="container" style="margin-top: 30px;">
            <div class="row">
                <div class="col-sm-9" id="container-content"><?php echo $template->render();?></div>
            </div>
        </div>
    </body>
</html>