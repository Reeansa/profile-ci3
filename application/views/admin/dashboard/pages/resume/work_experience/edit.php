<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">add doing</h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart( 'admin/pages/work_experience/update_process/'.$update['idwork'] ) ?>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="<?= $update['name'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="dateStart">date start</label>
            <div class="col-sm-10">
                <input type="date" name="dateStart" id="dateStart" class="form-control" value="<?= $update['date_start'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="dateEnd">date end</label>
            <div class="col-sm-10">
                <input type="date" name="dateEnd" id="dateEnd" class="form-control" value="<?= $update[ 'date_end' ] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="description">description</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control"><?= $update[ 'description' ] ?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="position">position</label>
            <div class="col-sm-10">
                <input type="text" name="position" class="form-control" id="position" value="<?= $update[ 'position' ] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">status</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <select name="status" id="status" class="select2 form-select">
                        <?php if ( $update[ 'status' ] == 'active' ) {
                            echo "<option value='active' selected>active</option>
                            <option value='nonactive'>non-active</option>";
                        }
                        else {
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