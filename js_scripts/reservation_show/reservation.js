var ajax = new XMLHttpRequest();
			var method = "GET";
			var url = "get_reservations.php";
			var asynchronous = true;

			ajax.open(method, url, asynchronous);

			ajax.send();

			ajax.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){		//jezeli kod HTTP jest 200 czyli okejka to parsuj jsona i zwr�� dane 
					var data = JSON.parse(this.responseText);
					console.log(data);		//log consoli w chromie do debuga b�ed�w

					var html = "";

					for(var a=0; a<data.length; a++){
						var id = data[a].clientID;
						var name = data[a].clientName;
						var surname = data[a].clientSurname;
						var eMail = data[a].clientEmail;
						var roomNumber = data[a].roomLabel;
						var cost = data[a].totalPrice;
						var begin = data[a].reservationStart;
						var end = data[a].reservationEnd;
						var resStatus = data[a].reservationStatus;
						var advStatus = data[a].advanceStatus;
						
						html += "<tr>";
							html += "<td>"+id+"</td>";
							html += "<td>"+name+"</td>";
							html += "<td>"+surname+"</td>";
							html += "<td>"+eMail+"</td>";
							html += "<td>"+roomNumber+"</td>";
							html += "<td>"+cost+"</td>";
							html += "<td>"+begin+"</td>";
							html += "<td>"+end+"</td>";
							html += "<td>"+resStatus+"</td>";
							html += "<td>"+advStatus+"</td>";
							html += "<td style='background-color: aquamarine'><form method='' action=''><button type='button' name='res_delete' value="+id+" class='reservation_delete far fa-trash-alt'></button></form></td>";
						html += "</tr>";
					}

					document.getElementById("reservations_body").innerHTML = html;
					
	}
}