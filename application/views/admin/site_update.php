<?php
/**
 * Created by VS Code.
 * User: ryanfrank
 * Date: 2019-01-27
 * Time: 13:56
 * Purpose: Primary view for site management
 */
?>
<script type="text/javascript">
    $(document).ready( function() {
        $('#updateSiteMessage').off('submit');
        $('#updateSiteMessage').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "Rehab/updateSiteMessage",
                dataType: "json",
                data: { "messageTitle": e.target[0].value, "messageText": e.target[2].value },
                success: function (result) {
                    if (result === "success") {
                        jQuery("div#updateStatus").html('<div id="success-alert" class="alert alert-success mt-lg-4 col-10 fade show" role="alert">Updated site message</div>');
                        $('#success-alert').fadeOut(3000);
                    } else {
                        jQuery("div#updateStatus").html('<div id="error-alert" class="alert alert-danger mt-lg-4 col-10 fade show" role="alert">Could not update site message</div>');
                        $('#error-alert').fadeOut(5000);
                    }
                }
            });
        });
        var uploader = new qq.FineUploader({
            debug: true,
            element: document.getElementById('fine-uploader'),
            request: {
                endpoint: '/uploads'
            },
            deleteFile: {
                enabled: true,
                endpoint: '/uploads'
            },
            retry: {
               enableAuto: true
            }
        });
    })
</script>
<script type="text/template" id="qq-template">
    <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
        <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
        </div>
        <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
        </div>
        <div class="qq-upload-button-selector qq-upload-button">
            <div>Upload a file</div>
        </div>
        <span class="qq-drop-processing-selector qq-drop-processing">
            <span>Processing dropped files...</span>
            <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
        </span>
        <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
            <li>
                <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                </div>
                <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                <div class="qq-thumbnail-wrapper">
                    <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                </div>
                <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                    <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                    Retry
                </button>

                <div class="qq-file-info">
                    <div class="qq-file-name">
                        <span class="qq-upload-file-selector qq-upload-file"></span>
                        <span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon" aria-label="Edit filename"></span>
                    </div>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                        <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                    </button>
                    <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                        <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                    </button>
                    <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                        <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                    </button>
                </div>
            </li>
        </ul>

        <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Close</button>
            </div>
        </dialog>

        <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">No</button>
                <button type="button" class="qq-ok-button-selector">Yes</button>
            </div>
        </dialog>

        <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
                <button type="button" class="qq-cancel-button-selector">Cancel</button>
                <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
        </dialog>
    </div>
</script>
<div class="container-fluid mt-5 container-style ml-4" style="min-height: 525px;">
    <div class="row col-12 mt-5">
        <div class="col-2">
            <div class="nav flex-column nav-pills menu-style mb-4" style="min-height: 525px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link menu-pill" id="v-pills-home-tab" data-toggle="pill" href="#v-site-messages" role="tab" aria-controls="v-pills-home" aria-selected="true">Site Messages</a>
            <a class="nav-link menu-pill" id="v-pills-profile-tab" data-toggle="pill" href="#v-facebook-post" role="tab" aria-controls="v-pills-profile" aria-selected="false">Facebook Post</a>
            </div>
        </div>
        <div class="col-10">
            <div class="container-fluid container-style mb-4" style="min-height: 525px;">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show" id="v-site-messages" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="container mt-4">
                            <form role="form" id="updateSiteMessage" data-toggle="validator" autocomplete="off">
                                <div class="row col-12">
                                    <div class="col-5">
                                        <label for="title-text" style="font-weight: 500;">New Title Text</label>
                                        <div class="input-group mb-3 col-12">
                                            <input type="text" class="form-control" id="title-text" required>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <label for="current-title-text" style="font-weight: 500;">Current Title</label>
                                        <div class="input-group mb-3 col-12">
                                            <input type="text" class="form-control" id="current-title-text" disabled value="<?php echo $siteInfo->main_page_title; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="col-5">
                                        <label for="message-text" style="font-weight: 500;">New Message Text</label>
                                        <div class="input-group mb-3 col-12">
                                            <textarea rows="10" type="text" class="form-control" id="message-text" style="resize: none;" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <label for="current-message-text" style="font-weight: 500;">Current Message</label>
                                        <div class="input-group mb-3 col-12">
                                            <textarea rows="10" type="text" class="form-control" id="current-message-text" style="resize: none;" disabled><?php echo $siteInfo->main_page_message; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-5 mt-3">
                                    <div class="input-group">
                                        <button type="submit" id="updateMessage" class="btn btn-outline-primary btn-sm">Update Message</button>
                                        <button type="reset" class="btn btn-outline-primary btn-sm ml-3">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-facebook-post" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="container mt-4">
                            <form role="form" id="facebookPost" data-toggle="validator" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label for="title-text" style="font-weight: 500;">Post Title</label>
                                        <div class="input-group mb-3 col-12">
                                            <input type="text" class="form-control" id="title-text" required>
                                        </div>
                                    </div>
                                    <div class="col-7">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                        <label for="message-text" style="font-weight: 500;">Post Message</label>
                                        <div class="input-group mb-3 col-12">
                                            <textarea rows="10" type="text" class="form-control" id="message-text" style="resize: none;" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-2 mb-2">
                                        <div id="fine-uploader" class="container-style h-100">

                                        </div>
                                    </div>
                                </div>
                                <div class="row col-5 mt-3">
                                    <div class="input-group">
                                        <button type="submit" id="updateMessage" class="btn btn-outline-primary btn-sm">Submit Post</button>
                                        <button type="reset" class="btn btn-outline-primary btn-sm ml-3">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>