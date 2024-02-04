<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic with Icons</h5>
        <small class="text-muted float-end">Merged input group</small>
    </div>
    <div class="card-body">
        <?= form_open( 'admin/pages/about/add_process' ) ?>
        <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">about</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>
                    <textarea id="basic-icon-default-message" class="form-control" placeholder="about you?"
                        aria-label="about you?" aria-describedby="basic-icon-default-message2"
                        name="body_text"></textarea>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">status</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <select name="status" id="status" class="select2 form-select">
                        <option value="active">active</option>
                        <option value="nonactive">non-active</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>