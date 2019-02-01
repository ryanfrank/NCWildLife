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
    })
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

                    <div class="tab-pane fade" id="v-facebook-post" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                </div>
            </div>
        </div>
    </div>
</div>