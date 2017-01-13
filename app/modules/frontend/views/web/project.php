<?php $this->set('title', $project->getDisplayLabel());?>
<?php //$this->set('description', 'RM ' . $project->start_price);?>
<style type="text/css">
    .card
    {
        background: #eceeef;
        color: #4b4b4b;
    }
</style>
<?php if($exe->user && $exe->user->hasAppliedProject($project)):?>
    <?php $this->set('description', 'Anda telah memohon untuk projek perumahan ini. Kami akan menghubungi anda dalam masa terdekat.');?>
<?php endif;?>
<div class="row">
    <div class="col-sm-6">
        <div style="padding: 10px;color: #737373; ">
            <div class="row">
                <div class="col-sm-6">
                    <div><strong>Gaji Pokok</strong></div>
                    <div>RM <?php echo $project->min_basic_salary;?></div>
                </div>
                <div class="col-sm-6">
                    <div><strong>Gaji Bersih</strong></div>
                    <div>RM <?php echo $project->min_net_salary;?></div>
                </div>
            </div>
        </div>
        <div style="color: #737373; margin-top: 20px; border-top: 1px solid #f2f2f2; padding-top: 10px; padding: 10px;">
            <div><h3>RM <?php echo $project->start_price;?></h3></div>
            <?php echo nl2br($project->description);?>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <?php foreach($projectImages as $projectImage):?>
            <div class="col-sm-6">
                <img style="width: 100%;" src="/apps/images/<?php echo $projectImage->path;?>" />
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div style="text-align: center; padding-top: 10px;">
            <?php if($exe->user):?>
                <?php if($exe->user->hasAppliedProject($project)):?>
                    <?php else:?>
                        <input type="button" onclick="window.location.href = '?apply=true';" class="btn btn-primary" value="Pohon Perumahan" />
                    <?php endif;?>
            <?php else:?>
            <input type="button" data-toggle="modal" data-target=".modal-form-apply" class="btn btn-primary" value="Pohon Perumahan" />
            <?php endif;?>
        </div>
    </div>
</div>
<div class="modal fade modal-form-apply">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Maklumat Anda</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group form-inline">
                        <label>Sektor Pekerjaan</label><br>
                        <label><?php echo $form->text('inquiry[sector]')->value('public')->attr('checked', true)->type('radio')->attr('class', 'form-control');?> Kerajaan</label>
                        <label><?php echo $form->text('inquiry[sector]')->value('private')->type('radio')->attr('class', 'form-control');?> Swasta</label>
                    </div>
                    <div class="form-group">
                        <label>Nama penuh anda</label>
                        <input type="text" name="inquiry[full_name]" class="form-control" placeholder="Nama penuh" />
                    </div>
                    <div class="form-group">
                        <label>No telefon</label>
                        <input type="text" class="form-control" name="inquiry[phone_no]" placeholder="No telefon" />
                    </div>
                    <div class="form-group">
                        <label>Emel</label>
                        <input type="email" class="form-control" name="inquiry[email]" placeholder="Alamat emel. Contoh hello@example.com" />
                    </div>
                    <div class="form-group">
                        <label>Gaji terkini</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group" style="padding-bottom: 5px;">
                                    <span class="input-group-addon">Gaji pokok</span>
                                    <input type="text" class="form-control" name="inquiry[basic_salary]" placeholder="RM ..." />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Gaji bersih</span>
                                    <input type="text" class="form-control" name="inquiry[net_salary]" placeholder="RM ..." />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <small class="form-text">Maklumat sulit seperti gaji dan no telefon hanya akan digunapakai untuk semakan, atau cara untuk hubungi tuan/puan</small>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        <input type="submit" value="Pohon" class="btn btn-primary" />
                    </div>
                </form>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
