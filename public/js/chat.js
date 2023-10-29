function ocultarChat(){
    var x = document.getElementById("chat");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

const link = 'http://127.0.0.1:8000/api/';
const linkHost = 'https://prophysio.tagme.uno/public/api/';
const linkAzure = 'https://prophysio.azurewebsites.net/api/';
const urlDefinitiva = linkAzure;

$(document).ready(function(){
    $("#send-btn").on("click", function(){
        $value = $("#data").val();
        if($value == ""){
            M.toast({html: 'Por favor, ingresa tu pregunta!'})
            return;
        }
        $msg = ` <div class="col s12">
        <div class="row">
            <div class="col s1"></div>
            <div class="col s8" style="border-radius: 15px; background: #efefef; padding: 12px 15px ;">
                <label class="black-text" style="word-break: break-all;  font-size: 15px;"> <b> ${$value} </b> </label>
            </div>
            <div class="col s2">
                <center><i class="material-icons left black-text" style="padding: 10px 10px; border-radius:50%;  margin-right:10px; background: #efefef; " >person</i> </center>
            </div>
        </div>
        </div>`;
        //$("#form").append($msg);
        document.getElementById("form").innerHTML += $msg;
        $("#data").val('');
        
        
        // start ajax code
        $.ajax({
            url: urlDefinitiva + "chatApi",
            type: 'GET',
            data: 'pregunta='+$value,
            success: function(result){
                $replay = ` <div class="col s12">
                    <div class="row">
                        <div class="col s2">
                            <center><i class="material-icons left black-text" style="padding: 10px 10px; border-radius:50%; background: #C7F7F7; " >person</i> </center>
                        </div>
                        <div class="col s8" style="border-radius: 15px; background: #C7F7F7; padding: 12px 15px ; margin-left:10px;">
                            <label class="black-text" style="word-break: break-all;  font-size: 15px;"> <b> ${result} </b> </label>
                        </div>
                        <div class="col s2"></div>
                    </div>
                </div>`;
                $("#form").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $("#form").scrollTop($("#form")[0].scrollHeight);
            }
        }); 
    });
});