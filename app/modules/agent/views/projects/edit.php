<h1>Edit Project</h1>
<p>Edit property project</p>
<p></p>
<script type="text/javascript">
    var project = new function($)
    {
        this.addImage = function()
        {
            var container = $('.container-images');
            var wrapper = $('.wrapper-image')[0];
            container.append($(wrapper).clone());
        };

        this.deleteImage = function(id)
        {
            $.ajax({type: 'POST', url: '<?php echo $url->admin('projects', 'deleteImage');?>?id='+id}).done(function()
            {
                $('.project-image-'+id).remove();
            });
        };
    }(jQuery);
</script>
<div class="row">
    <form method="post" enctype="multipart/form-data">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Project name</label>
                <?php echo $form->text('name')->attr('required', true)->addClass('form-control');?>
            </div>
            <div class="form-group">
                <label>Starting Price</label>
                <div class="input-group">
                    <span class="input-group-addon">RM</span>
                    <?php echo $form->text('start_price')->attr('required', true)->addClass('form-control');?>
                </div>
            </div>
            <div class="form-group">
                <label>States</label>
                <div class="input-group">
                    <?php echo $form->select('state')->attr('class', 'form-control')->options(\App\Helper\Helper::getStates());?>
                </div>
            </div>
            <div class="form-group">
                <label>Minimum Salaries</label>
                <div class="input-group">
                    <span class="input-group-addon">Basic</span>
                    <?php echo  $form->text('min_basic_salary')->attr('required', true)->addClass('form-control');?>
                    <span class="input-group-addon">Net</span>
                    <?php echo $form->text('min_net_salary')->attr('required', true)->addClass('form-control');?>
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <?php echo $form->textarea('description')->attr('required', true)->attr('style', 'height: 220px;')->addClass('form-control');?>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Images</h3>
            <div class="row" style="margin-bottom: 20px;">
                <div class="container-project-images">
                <?php foreach($project->images as $projectImage):?>
                <div class="col-sm-6 project-image-<?php echo $projectImage->id;?>" style="position: relative;">
                    <a href="javascript:;" onclick="project.deleteImage(<?php echo $projectImage->id;?>)" class="fa fa-trash" style="position: absolute; right:20px; top: 0px; color: darkred;"></a>
                    <img style="width: 100%;" src="<?php echo $url->images($projectImage->path);?>" />
                </div>
                <?php endforeach;?>
                </div>
            </div>
            <p>Add more image(s)</p>
            <div class="container-images">
                <div class="form-group wrapper-image">
                    <?php echo $form->file('project_image[]')->attr('class', 'form-control');?>
                </div>
            </div>
            <a href="javascript:;" class="btn btn-primary" onclick="project.addImage();"><span class="fa fa-plus"></span> Select more image</a>
        </div>
    </form>

</div>