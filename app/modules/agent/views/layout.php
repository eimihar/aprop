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
    <script type="text/javascript">
        var ci = new function($)
        {
            this.modal = new function()
            {
                this.open = function(path)
                {
                    $.ajax({url: '/admin/'+path}).done(function(contents)
                    {
                        $('.modal-box').html(contents).modal();
                    });
                };
            };
        }(jQuery);
    </script>
</head>
<body>
<div class="template-modal">
    <div class="modal-box modal fade modal-form-apply"></div>
</div>
<div class="container" style="padding-top: 20px;">
    <div class="header">
        <strong>Welcome back!</strong>
        <span class="pull-right">
                    <a href="<?php echo $url->frontend();?>" target="_blank"><span class="fa fa-external-link-square"></span> Web</a> |
                    <a href="<?php echo $url->admin('inquiries');?>"><span class="fa fa-question"></span> Inquiries</a> |
                    <a href="<?php echo $url->admin('projects');?>"><span class="fa fa-folder"></span> Projects</a> |
                    <a href="<?php echo $url->admin('auth', 'logout');?>"><span class="fa fa-power-off"></span> Logout</a>
                </span>
    </div>
</div>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-sm-12" id="container-content"><?php echo $template->render();?></div>
    </div>
</div>
</body>
</html>