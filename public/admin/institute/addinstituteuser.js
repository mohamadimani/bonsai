/**
 * Created by Programmer on 2017-09-11.
 */

var rootFolder='';
switch (document.location.hostname)
{
    case 'localhost' :
        rootFolder = window.location.protocol+'//'+document.location.hostname+'/italk';
        break;
    default :
        rootFolder= window.location.protocol+'//'+document.location.hostname;
        break;
}
function showhint()
{
    var hint='در اینجا زبان هایی که در آموزشگاه آموزش داده می شود را تعریف می کنید. شما می توانید در هر زمان این زبان ها را فعال یا غیرفعال کنید.';
    $('#ticketmodal-content').html('<div class="modal-body">'+hint+'</div>');
    $('myModal').modal('show');
}

$(document).ready(function(){
    $('#birthdateshow').persianDatepicker({
        format: 'YYYY/MM/DD',
        altField: '#birthdate',
        altFormat:"X"
    });
});

function register()
{
    var username=$('#username').val(),
        password=$('#password').val(),
        email=$('#email').val(),
        type=$('#type').val(),
        ashnaei=$('#ashnaei').val(),
        firstname=$('#firstname').val(),
        lastname=$('#lastname').val(),
        birthdate=$('#birthdate').val(),
        nationalcode=$('#nationalcode').val(),
        ostan=$('#ostan').val(),
        city=$('#city').val(),
        address=$('#address').val(),
        postalcode=$('#postalcode').val(),
        home_phone=$('#home_phone').val(),
        cell_phone=$('#cell_phone').val(),
        emergency_phone=$('#emergency_phone').val(),
        education=$('#education').val(),
        study_field=$('#study_field').val();

    $.post(rootFolder+"/admin_ajaxdo/addinstituteuser",
        {
            wtd: "addinstituteuser",
            username:username,
            password:password,
            email:email,
            type:type,
            ashnaei:ashnaei,
            firstname:firstname,
            lastname:lastname,
            birthdate:birthdate,
            nationalcode:nationalcode,
            ostan:ostan,
            city:city,
            address:address,
            postalcode:postalcode,
            home_phone:home_phone,
            cell_phone:cell_phone,
            emergency_phone:emergency_phone,
            education:education,
            study_field:study_field
        },
        function(data, ajaxstatus){
            var arr='';
            try{
                arr=JSON.parse(data);
            }
            catch(e){
                arr=data;
            }
            if(arr.constructor===Array)
            {
                var subject='';
                var message='';
                var status='error';

                if(arr[0]==1)
                {
                    subject='موفق';
                    message='کاربر '+firstname+''+lastname+' با موفقیت اضافه شد.';
                    status='success';
                }
                else if(arr[0]==0)
                {
                    subject='خطا';
                    status='error';
                    message=arr[1];
                }
                else
                {
                    subject='خطا';
                    status='error';
                    message=data;
                }
            }
            else
            {
                subject='خطا';
                status='error';
                message=data;
            }
            $("#myModal").modal('hide');
            swal(subject,message,status);
        });
}
