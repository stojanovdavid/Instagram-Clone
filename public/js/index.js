function follow(val){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $userId = document.getElementById('user').value;
    $authUserId = document.getElementById('authUser').value;


    $.ajax({
        url: '/follow/' + $authUserId + '/' + $userId + '/' + val,
        method: 'post',
        success : function(data){
            console.log(data);
        }
    });
}