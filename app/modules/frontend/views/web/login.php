<?php
$this->set('title', 'Agent Login');
$this->set('description', 'Log masuk sebagai agent casa idaman');
?>
<div class="row">
    <div class="col-sm-6">
        <form method="post">
            <div class="form-group">
                <label>Email</label>
                <?php echo $form->text('email')->attr('class', 'form-control');?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <?php echo $form->password('password')->attr('class', 'form-control');?>
            </div>
            <div>
                <?php echo $form->submit('Login')->attr('class', 'btn btn-primary');?>
            </div>
        </form>
    </div>
</div>
