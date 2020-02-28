$('#admin-login').submit(function(){
    if($('#admin-login').valid()==true){
        $('#pshoBtnl').attr('disabled' , true);
        $('#pshoBtnl').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});

function blockMember(url){
    swal({
        title: 'Are you sure?',
        text: "you want to block this member!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-warning',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {
        window.location.href = url;
    });
}

function deleteMember(url){
    swal({
        title: 'Are you sure?',
        text: "you want to delete this member!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-warning',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {
        window.location.href = url;
    });
}

function deleteSale(url){
    swal({
        title: 'Are you sure?',
        text: "you want to delete this sale!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-warning',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {
        window.location.href = url;
    });
}

$('#sale-form').submit(function(){
    if($('#sale-form').valid()==true){
        $('#saleBtn').attr('disabled' , true);
        $('#saleBtn').html('<i class="fa fa-refresh fa-spin" style="color:#fff"></i>');
        return true;
    }else{
        return false;
    }
});

function setAmount(id){
    Pace.ignore(function(){ 
        $.ajax({
            url: base_url+'admin/package/singlePackage/'+id,
            type: "GET",
            success: function (data, textStatus, xhr) {
                $('#package_amount').val(data);
                $('#amount_usd').val(data);
            },
            error: function (data, textStatus, xhr) {
                alert('Error:'+data);
            }
        });
    });
}