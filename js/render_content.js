$(document).ready(function () {
    $.get('admin/fetch_data.php?data=career', function (data) {
        var companies = {};
        data.forEach(function (current) {
            if (!companies.hasOwnProperty(current.company_name)) {
                companies[current.company_name] = {
                    'jobs'            : [],
                    'company_brief'   : current.company_brief,
                    'company_name'    : current.company_name,
                    'company_category': current.company_category
                };
            }
            companies[current.company_name]['jobs'].push(current);
        });

        var is_left = true;
        for (var company in companies) {
            if (!companies.hasOwnProperty(company)) {
                continue;
            }
            //console.log(company);

                if (is_left) {
                    $('.company-handle').append('<div class="container-fluid company-wrap"><section class="row"><div class="col-12 col-lg-4 company-info-wrap"><span class="span-title">' + companies[company]['company_category'] + '</span><h2 class="h2-blue company-name">' + company + '</h2><p class="p-grey">' + companies[company]['company_brief'] + '</p></div><div class="col-12 col-lg-8 job-info-wrap row"></div></section></div>');
                } else {
                    $('.company-handle').append('<div class="container-fluid company-wrap right"><section class="row"><div class="col-12 col-lg-8 order-12 order-lg-1 job-info-wrap row"></div><div class="col-12 col-lg-4  order-1 order-lg-12 company-info-wrap"><span class="span-title-white">' + companies[company]['company_category'] + '</span><h2 class="h2-grey-light">' + company + '</h2><p class="p-white">' + companies[company]['company_brief'] + '</p></div></section></div>');
                }

            companies[company]['jobs'].forEach(function (currentJob) {
                //console.log(companies[company]['company_name']);

                var html_snippet = '<div class="job-first-wrap col-lg-5 offset-lg-1 row"><div class="job-first-img col-6 col-lg-12"><img src="images/' + currentJob.job_image + '" alt="' + currentJob.job_title + '"></div><div class="job-first-info col-6 col-lg-12"><div class="job-first-info-pos"><span class="span-title-grey">' + companies[company]['company_name'] + '</span><h2 class="h2-blue">' + currentJob.job_title + '</h2></div></div><div class="col-lg-12 job-first-desc d-none d-lg-block"><p class="p-grey-dark">' + currentJob.job_desc + '</p></div></div>';
                $('.job-info-wrap').append(html_snippet);

                //console.log(html_snippet);
            });
            is_left = !is_left;
        }
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