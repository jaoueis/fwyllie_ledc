$(document).ready(function () {
    $('.cmsTables').DataTable({responsive: true});

    $.get("fetch_chart.php?getChart=job_pie", function(result){

        google.charts.load('current', {packages: ['corechart']}); 
        google.charts.setOnLoadCallback(drawChart); 
        function drawChart() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Position'); //a column value type is string
          data.addColumn('number', 'Amount'); //another column value type is number
          for(let i = 0; i < result.length; i++){
            let job = result[i].position;
            let amount = result[i].amount;
            data.addRows([[job, Number(amount)]]);
        }
        
        var options = {'title':'Available Positions',
                         'width':800,
                         'height':300};		
                         
        var chart = new google.visualization.PieChart(document.getElementById('jobChart')); 
        chart.draw(data, options);
        }
    });

    $.get("fetch_chart.php?getChart=job_column", function(result){

        google.charts.load('current', {packages: ['corechart']}); 
        google.charts.setOnLoadCallback(drawChart); 
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'company'); //a column value type is string
            data.addColumn('number', 'number of jobs'); //another column value type is number
            for(let i = 0; i < result.length; i++){
                let job = result[i].company;
                let amount = result[i].job_amount;
                data.addRows([[job, Number(amount)]]);
            }
            
            var options = {'title':'Jobs offered by Companies',
                             'width': 800,
                             'height': 400};		
                             
            var chart = new google.visualization.ColumnChart(document.getElementById('companyChart')); 
            chart.draw(data, options);
        }
    });

    $(document).on('click', '.selectCareer', function (e) {
        $.get('cms_fetch_data.php?content=career&getData=' + $(this).attr('id'), function (data) {
            $('#careerId').val(data.career_id);
            $('#companyId').val(data.company_name);
            $("#jobCategory").val(data.job_category);
            $('#jobTitle').val(data.job_title);
            $('#jobIntro').text(data.job_desc);
        });
        e.preventDefault();
    });

    $(document).on('click', '.selectLifestyle', function (e) {
        $.get('cms_fetch_data.php?content=lifestyle&getData=' + $(this).attr('id'), function (data) {
            $('#lifestyleId').val(data.lifestyle_id);
            $('#lfCategory').val(data.category);
            $('#lfTitle').val(data.lifestyle_title);
            $('#lfImage').val(data.lifestyle_image);
            $('#lfContent').text(data.lifestyle_content);
        });
        e.preventDefault();
    });

    $(document).on('click', '.selectCompany', function (e) {
        $.get('cms_fetch_data.php?content=company&getData=' + $(this).attr('id'), function (data) {
            $('#companyId').val(data.company_id);
            $('#companyName').val(data.company_name);
            $('#postal').val(data.postal);
            $('#companyAddr').val(data.address);
            $('#companyLat').val(data.company_latitude);
            $('#companyLong').val(data.company_longitude);
            $('#companyBrief').text(data.company_brief);
        });
        e.preventDefault();
    });
});