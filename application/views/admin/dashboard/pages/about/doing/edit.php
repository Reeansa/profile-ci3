<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">add doing</h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart( 'admin/pages/doing/edit_process/'.$updateDoing['iddoing'] ) ?>
        <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">icons</label>
            <div class="col-sm-10">
                <img src="<?= base_url('assets/images/icons/'. $updateDoing[ 'icons' ] )?>" class="mb-3" alt="">
                <div class="input-group input-group-merge">
                    <input class="form-control" type="file" id="icons" name="icons">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">skills</label>
            <div class="col-sm-10">
                <input type="text" name="skills" class="form-control" id="basic-default-name" value="<?= $updateDoing[ 'skills' ] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">status</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <select name="status" id="status" class="select2 form-select">
                        <?php if ($updateDoing[ 'status' ] == 'active') {
                            echo "<option value='active' selected>active</option>
                            <option value='nonactive'>non-active</option>";
                        } else {
                            echo "<option value='active'>active</option>
                            <option value='active' selected>non-active</option>";
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" value="upload">Send</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>