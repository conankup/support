$(function(){
    var sectorObject = $('#sector');
    var jobObject = $('#job');
 
    // on change ส่วนงาน
    sectorObject.on('change', function(){
        var sectorId = $(this).val();
        // sectorObject.html('<option value="">เลือกส่วนงาน</option>')
        jobObject.html('<option value="">เลือกตำแหน่งงาน</option>');
        
        $.get('get_job.php?sector_id=' + sectorId, function(data){
            var result = JSON.parse(data);
            $.each(result, function(index, item){
                jobObject.append(
                    $('<option></option>').val(item.job_id).html(item.job_name)
                );
            });
        });
    });


 
});
