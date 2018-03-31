var date= new Date();//Обьект дата
		
		var rusMonth = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
		var month = date.getMonth();
		var year = date.getFullYear();
		dayInMonthCoanter();
	window.onload = function (){
		document.getElementById("monthJS").innerHTML = rusMonth[month] + " " + year;
				dayCounter();
			};
			function showMonthAndYear(){
				document.getElementById("monthJS").innerHTML = rusMonth[month] + " " + year;
			};
			function prevMonth(){
				 month--;
					if(month < 0){
							year--;
							month = 11;
						}
				dayInMonthCoanter();
				showMonthAndYear();
				dayCounter();
				
				};
			function nextMonth(){
					month++;
					if(month > 11){
							year++;
							month = 0;
						}
				dayInMonthCoanter();
					showMonthAndYear();
					dayCounter();
				};
			function dayCounter(){
				document.getElementById('days').innerHTML = "";
					for(var i = 1; i < emptyDay; i++){
						document.getElementById('days').innerHTML += '<div id="dayoff"></div>';
					}
					for(var i = 1; i <= daysInMonth; i++){
						if (i % 2 == 0){
								document.getElementById('days').innerHTML += '<a href="http://localhost/SSV/entry/settime/'+ i +':' + (month+1) + ':' + year + '"><div id="day">' + i + '</div><a/>';
							}
						else {
							document.getElementById('days').innerHTML += '<div id="dayoff">' + i + '</div>';
							}
						
						}
				};
			function dayInMonthCoanter(){
				dayInMonth= new Date(year, month+1, 0);//Обьект дата
				daysInMonth = dayInMonth.getDate();
				startDayInMonth= new Date(year, month, 1);
				emptyDay = startDayInMonth.getDay();
					if(emptyDay == 0){
							emptyDay = 7;
						}
				};
