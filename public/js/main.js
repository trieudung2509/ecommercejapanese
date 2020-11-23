$(document).ready(function() {
    $('#customCheck1').click(function(){
        var arrChecked = [];
        $check = $(this).prop('checked');
        $('.custom-control input:checkbox').prop('checked',$check);
        $(".custom-control input[name='check_cate']:checked").each(function() {
            arrChecked.push($(this).val());
        });
        $("input[name='select_box']").val(arrChecked);
    });
    $(".custom-control input[name='check_cate']").on('change', function() {
        var arrChecked = [];
        $(".custom-control input[name='check_cate']:checked").each(function() {
            arrChecked.push($(this).val());
        });
        $("input[name='select_box']").val(arrChecked);
    });
    $(document).on('click','.search-icon', function() {
        $("#form-search").submit();
    });
});