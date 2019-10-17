var ajax = new XMLHttpRequest();
var method = "GET";
var url = "get_users.php";
var asynchronous = true;

ajax.open(method, url, asynchronous);

ajax.send();

ajax.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){		//jezeli kod HTTP jest 200 czyli okejka to parsuj jsona i zwr�� dane 
        var data = JSON.parse(this.responseText);
        console.log(data);		//log consoli w chromie do debuga b�ed�w

        var html = "";

        for(var a=0; a<data.length; a++){
            var ID = data[a].userID;
            var Nazwa = data[a].userName;
            var E_mail = data[a].userEmail;
            var Permission = data[a].permissionDescription;
            
            html += "<tr>";
                html += "<td>"+ID+"</td>";
                html += "<td>"+Nazwa+"</td>";
                html += "<td>"+E_mail+"</td>";
                html += "<td>"+Permission+"</td>";
                html += "<td style='background-color: aquamarine'><form class='delete_u_form' method='POST' action='user_delete.php'><input type='hidden' name='uid' value="+ID+"><button type='submit' name='user_delete' class='far fa-trash-alt' id='user_delete'></button></form></td>";
            html += "</tr>";
        }

        document.getElementById("users_body").innerHTML = html;
        
    }
}