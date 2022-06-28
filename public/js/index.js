
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function follow(val){


    $userId = document.getElementById('user').value;
    $authUserId = document.getElementById('authUser').value;


    $.ajax({
        url: '/follow/' + $authUserId + '/' + $userId + '/' + val,
        method: 'post',
        success : function(data){
            location.reload();
        }
    });
}

function unfollow(val){

    $userId = document.getElementById('user').value;
    $authUserId = document.getElementById('authUser').value;


    $.ajax({
        url: '/unfollow/' + $authUserId + '/' + $userId + '/' + val,
        method: 'post',
        success : function(data){
            location.reload();
        }
    });
}




function sendTo(authId){
    event.preventDefault();
    $('#messageModal').modal('hide');
    let message = document.getElementById('sendMessage').value;
    let recieverId = document.getElementById('reciever').value;


    $.ajax({
        url: 'message/send/' + authId + '/' + recieverId + '/' + message,
        method : 'post',
        success: function(data){
            console.log(data);
            location.reload();
        }
    })
}


function sendMessage(authId, userId){
    console.log(userId);
    let message = document.getElementById('sentMessage').value;
    $.ajax({
        url :  'message/send/' + authId + '/' + userId + '/' + message,
        method: 'post',
        success: function(data){
            let dataOBj = JSON.parse(data);
            let message = dataOBj.message;
            console.log(message);
        } 
    });
}

function comment($authId, $postId){
    let commentMsg = document.getElementById('commentPost').value;
    $.ajax({
        url : 'comment' + '/' + $authId + '/' + $postId + '/' + commentMsg,
        method: 'post',
        success: function(data){
            let commentObj = JSON.parse(data);
            let comment = commentObj.comment;
            console.log(comment);
        }
    });

}

