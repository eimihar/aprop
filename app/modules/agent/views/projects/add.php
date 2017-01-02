<h1>Add New Project</h1>
<p>Register new property project</p>
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
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Images</h3>
            <p>Add image(s)</p>
            <div class="container-images">
                <div class="form-group wrapper-image">
                    <?php echo $form->file('project_image[]')->attr('class', 'form-control');?>
                </div>
            </div>
            <a href="javascript:;" class="btn btn-primary" onclick="project.addImage();"><span class="fa fa-plus"></span> Select more image</a>
        </div>
    </form>

</div>