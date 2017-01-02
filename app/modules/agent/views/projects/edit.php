<h1>Edit Project</h1>
<p>Edit project information</p>
<div class="row">
    <div class="col-sm-6">
        <form method="post">
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
        </form>
    </div>
</div>