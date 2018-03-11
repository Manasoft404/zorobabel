jQuery(document).ready(function($) {

var token = getUrlParameter('token');
var confirm = getUrlParameter('confirm');


if (token !== undefined){
    if (confirm==1){
        confirmUserSubscription(token);
    }else  {
        fetchUserDataByToken(token);
    }
}

function getUrlParameter(sParam) {
   var sPageURL = decodeURIComponent(window.location.search.substring(1)),
       sURLVariables = sPageURL.split('&'),
       sParameterName,
       i;

   for (i = 0; i < sURLVariables.length; i++) {
       sParameterName = sURLVariables[i].split('=');

       if (sParameterName[0] === sParam) {
           return sParameterName[1] === undefined ? true : sParameterName[1];
       }
   }
};


function reCheckSubscription (listsIds) {
           //unset all checkboxes
    // $('input[type=checkbox]').each(function () {
    //    $(this).attr('checked', false);
    // });

       //check only those checkboxes which are currently subscribed by user
    lists = listsIds;
    var arrayLength = lists.length;
    for (var i = 0; i < arrayLength; i++) {
        $('#list_' + lists[i]).attr('checked', true);
    }

}


function confirmUserSubscription(token) {
        action = 'confirm_user_subscription';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_newsletter_object.ajaxurl,
            data: {
                'action': action,
                'token': token
                //'security': security
            },
            success: function(data) {

                if (data.status==1){
                    $('#title').text("Hello " + data.row.name)
                    $('#submitButtonId').text("Update");
                    $('#unsubscribeButton').show();

                }
                $('#nlStatus').html(data.message);
                $('#nlName').val(data.row.name);
                $('#nlNameLabel').addClass('active');

                $('#nlMail').val(data.row.mail);
                $('#nlMailLabel').addClass('active');
                $('#token').val(data.row.token);

                reCheckSubscription(data.lists);

            },
            error: function(xhr, ajaxOptions, thrownError) {
           console.log(xhr.status);
           console.log(xhr.responseText);
           console.log(thrownError);
            //alert("error");

                console.log(xhr);
            }
        });


}

function fetchUserDataByToken(token) {
        action = 'fetch_user_data';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_newsletter_object.ajaxurl,
            data: {
                'action': action,
                'token': token
            },
            success: function(data) {

                if (data.status==1){
                    $('#title').text("Hello " + data.row.name)
                    $('#submitButtonId').text("Update");
                    $('#unsubscribeButton').show();

                }
                $('#nlStatus').html(data.message);
                $('#nlName').val(data.row.name);
                $('#nlNameLabel').addClass('active');

                $('#nlMail').val(data.row.mail);
                $('#nlMailLabel').addClass('active');
                $('#token').val(data.row.token);

                reCheckSubscription(data.lists);



            },
            error: function(xhr, ajaxOptions, thrownError) {
           console.log(xhr.status);
           console.log(xhr.responseText);
           console.log(thrownError);
            //alert("error");

                console.log(xhr);
            }
        });


}


    // Perform AJAX login/register on form submit
    $('#submitButtonId,#unsubscribeButton, #1lvlModal-submit').on('click', function(e) {
        //if (!$(this).valid()) return false;

        console.log(this.id);

        $('#nlStatus').html(ajax_newsletter_object.loadingmessage);
        $('div.form-header').removeClass("purple");
        $('div.form-header').addClass("orange");

        action = 'ajax_subscribe';
        token = $('#token').val();
        name = $('#nlName').val();
        email = $('#nlMail').val();
        wpId = $('#wpId').val();
        route ='';
        if (this.id=="unsubscribeButton"){
            route="unsubscribe";
        }


        var sList = "";
        $('input[type=checkbox]').each(function () {
            if(this.checked ){
            var sThisVal =  this.name;
            sList += (sList=="" ? sThisVal : "," + sThisVal);
        }
        });

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_newsletter_object.ajaxurl,
            data: {
                'action': action,
                'route': route,
                'wpId' : wpId,
                'name': name,
                'email': email,
                'lists': sList,
                'token': token
                //'security': security
            },
            success: function(data) {
                                console.log(data);

                $('#nlStatus').html(data.message);


                //If status==1 user registration was successful
                if(data.status==1){

                // Confirmation modal
                if (route!="unsubscribe")
                $("#subscriptionSuccess").modal(); 

                // 1lvl modal
                document.getElementById("1lvlModalSubscribe").style.display = "none";
                document.getElementById("1lvlModalConfirm").style.display = "block";

                 //if status==0, user was already registered in a newsletter
                }else if (data.status==0){

                    //set colors of header
                 $('div.form-header').removeClass("orange yellow red green");
                 $('div.form-header').addClass("yellow");
                 reCheckSubscription(data.lists);



                //if status==-1, there was an error during execution 
                }else if (data.status==-1){ 
                 $('div.form-header').removeClass("orange yellow red green");
                 $('div.form-header').addClass("red");
                } else {
                    $('#nlStatus').html("Undefined error ;( <br> Please let us know. "); 
                }


                $('#nlStatus').html(data.message);


            },
            error: function(xhr, ajaxOptions, thrownError) {
           console.log(xhr.status);
           console.log(xhr.responseText);
           console.log(thrownError);
            //alert("error");

                console.log(xhr);
            }
        });
        e.preventDefault();
    });



});

