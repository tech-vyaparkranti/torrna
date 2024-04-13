function refreshCapthca(img_id,txt_box_id) {
    $.ajax({
        url: 'refresh-captcha',
        method: 'get',
        dataType: 'json',
        success: function(response) {
            if (response.status) {
                $("#"+img_id).attr("src", response.data);
                $("#"+txt_box_id).val("");
            } else {
                errorMessage(response.message);
            }
        },
        error: function(err) {
            errorMessage("error occurred");
        }
    });
}