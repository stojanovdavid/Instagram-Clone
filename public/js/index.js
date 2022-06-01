$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function follow(val){


    let input = document.getElementById('follow');


    $userId = document.getElementById('user').value;
    $authUserId = document.getElementById('authUser').value;


    $.ajax({
        url: '/follow/' + $authUserId + '/' + $userId + '/' + val,
        method: 'post',
        success : function(data){
            console.log(data);
            document.getElementById('flw').innerHTML = 'Unfollow'
        }
    });
}


function getVal(){
    let inputVal = document.getElementById('sendTo').value;
    return inputVal;
}

function sendTo(authId){
    console.log('k');
    $('#messageModal').modal('hide');
    let message = document.getElementById('sendMessage').value;
    let recieverId = getVal();


    $.ajax({
        url: 'message/send/' + authId + '/' + recieverId + '/' + message,
        method : 'post',
        success: function(data){
            console.log(data);
        }
    })
}


function sendMessage($authId, $userId){

    let message = document.getElementById('sentMessage').value;
    $.ajax({
        url :  'message/send/' + $authId + '/' + $userId + '/' + message,
        method: 'post',
        success: function(data){
            let dataOBj = JSON.parse(data);
            let message = dataOBj.message;
            console.log(message);
        } 
    });
}
