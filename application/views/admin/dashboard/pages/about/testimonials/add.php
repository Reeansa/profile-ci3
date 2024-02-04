<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' ); ?>

<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">add doing</h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart( 'admin/pages/testimonials/add_process' ) ?>
        <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">profile</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <input class="form-control" type="file" id="profile" name="profile">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="basic-default-name" placeholder="....">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">comments</label>
            <div class="col-sm-10">
                <textarea name="comments" id="basic-default-message" class="form-control"></textarea>
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
                <button type="submit" class="btn btn-primary" value="upload">Send</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>