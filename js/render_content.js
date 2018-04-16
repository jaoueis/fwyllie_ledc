$(document).ready(function () {
    $.get('admin/fetch_data.php?data=career', function (data) {
        $('#slot1').html(data[0].statistic_desc);
        $('#slot2').html(data[1].statistic_desc);
        $('#slot3').html(data[2].statistic_desc);
        $('#slot4').html(data[3].statistic_desc);
    });
    $.get('admin/fetch_data.php?data=lifestyle', function (data) {
        var i;
        for (i = 0; i < data.length; i++) {
            if (i % 2 == 0) {
                $('.lifestyle-content-wrap').append('<div class="container-fluid lifestyle-content"><section class="row"><div class="col-12 col-lg-5 offset-lg-1 ls-img"><img src="images/' + data[i].lifestyle_image + '" alt="' + data[i].lifestyle_title + '"></div><div class="col-12 col-lg-5 ls-desc"><span class="span-title">' + data[i].category + '</span><h2 class="h2-blue">' + data[i].lifestyle_title + '</h2><p class="p-grey-dark">' + data[i].lifestyle_content + '</p></div></section></div>');
            } else if (i % 2 == 1) {
                $('.lifestyle-content-wrap').append('<div class="container-fluid lifestyle-content right"><section class="row"><div class="col-12 col-lg-5 order-lg-12 ls-img"><img src="images/' + data[i].lifestyle_image + '" alt="' + data[i].lifestyle_title + '"></div><div class="col-12 col-lg-5 offset-lg-1 ls-desc order-lg-1"><span class="span-title-white">' + data[i].category + '</span><h2 class="h2-grey">' + data[i].lifestyle_title + '</h2><p class="p-white">' + data[i].lifestyle_content + '</p></div></section>');
            }
        }
    });
});