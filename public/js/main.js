$(document).ready(function() {
    $('#customCheck1').click(function(){
        $check = $(this).prop('checked');
        $('.custom-control input:checkbox').prop('checked',$check);
    });
});