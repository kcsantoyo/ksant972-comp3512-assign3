//$(document).ready(function(){
    
//service-totals.php
$.get("service-totals.php")
    .done(function (data) {
        //Total Visits in June
        //console.log(data);
        var firstH = $("<h3></h3>");
        var divOne = $("#totalVisitsJune");
        
        firstH.html(data['totalVisits']);
        divOne.append(firstH);
        divOne.append("Total # of visits in June");
        
        //Total Unique Visits
        var secondH = $("<h3></h3>");
        var divTwo = $("#totalUniqueVisits");
        
        secondH.html(data['uniqueCountries']);
        divTwo.append(secondH);
        divTwo.append("Total # of Unique Countries Visited This Site");
        
        //Total ToDos
        var thirdH = $("<h3></h3>");
        var divThree = $("#totalToDo");
        
        thirdH.html(data['ToDos']);
        divThree.append(thirdH);
        divThree.append("Total # of Employees To Do's in June");
        
        //Total Messages
        var fourthH = $("<h3></h3>");
        var divFour = $("#totalMessages");
        
        fourthH.html(data['numMsg']);
        divFour.append(fourthH);
        divFour.append("Total # of Messages in June");
    })
    .fail(function (jqXHR) {
        console.log("Error: " + jqXHR.status);
    })
    .always(function () {
        console.log("Initialized: service-totals.");
});

//service-topCountries.php
$.get("service-topCountries.php")
    .done(function (data) {
        //console.log(data);
        for (var i = 0; i < data.length; i++) {
            var option = $("<option></option>");
            option.attr('value', data[i]['CountryName']).text(data[i]['CountryName']);
            $("#top15CountriesList").append(option);
        }
        $("#top15CountriesList").change(function() {
            var name = $(this).val();
            var visits;
            for (var i = 0; i < data.length; i++) {
                var country = data[i]['CountryName'];
                if (country == name) {
                    visits = data[i]['visitCount'];
                }
            }
            $('#countryInfo').html("<p><b>Number of Visitors: </b>" + visits + "</p>");
        });
    })
    .fail(function (jqXHR) {
        console.log("Error: " + jqXHR.status);
    })
    .always(function() {
        console.log("Initialized: service-topCountries.");
});

//service-topAdoptedBooks.php
$.get("service-topAdoptedBooks.php")
    .done(function (data) {
        //console.log(data);
        var table = $("#top15Books");

        for(var i=0; i<data.length; i++) {
            var tr = $("<tr></tr>");
            table.append(tr);
            
            var td1 = $("<td></td>");
            td1.attr("class", "mdl-data-table__cell--non-numeric");
            td1.html(i + 1);
            tr.append(td1);
            
            var td2 = $("<td></td>");
            td2.attr("class", "mdl-data-table__cell--non-numeric");
            var bookImage = $("<img></img>");
            bookImage.attr("src", "book-images/thumb/" + data[i]['ISBN10'] + ".jpg");
            td2.append(bookImage);
            tr.append(td2);
            
            var td3 = $("<td></td>");
            td3.attr("class", "mdl-data-table__cell--non-numeric");
            var anchor = $("<a></a>");
            anchor.attr("href", "single-book.php?ISBN10=" + data[i]['ISBN10'])
            anchor.html(data[i]['Title']);
            td3.append(anchor);
            tr.append(td3);
            
            var td4 = $("<td></td>");
            td4.attr("class", "mdl-data-table__cell--non-numeric");
            td4.html(data[i]['Adoptions']);
            tr.append(td4);
            
        }
    })
        
    .fail(function (jqXHR) {
        console.log("Error: " + jqXHR.status);
    })
    .always(function() {
        console.log("Initialized: service-topAdoptedBooks.");
    });

//service-countryVisits.php
$.get("service-countryVisits.php")
    .done(function (data) {
        //console.log(data);
        for (var i = 0; i < data.length; i++) {
            var option = $("<option></option>");
            option.attr('value', data[i]['CountryCode']).text(data[i]['CountryCode']);
            $("#countryCodeList").append(option);
        }
        
        if (data.length == 32) {
            $('#cName').text("Country Name: " + data[0]['CountryName']);
            $('#cVisits').text("Number of Visitors: " + data[0]['visitCount']);
        }
    })
    .fail(function (jqXHR) {
        console.log("Error: " + jqXHR.status);
    })
    .always(function() {
        console.log("Initialized: service-countryVisits");
    });
    
//service-chartMonth.php
$.get("service-chartMonth.php")
    .done(function (data) {
        console.log(data);
        google.charts.load('current', {'packages' :['corechart']});
        google.charts.setOnLoadCallback(drawVisitChart);
        
        function drawVisitChart() {
        var chartData =  new google.visualization.DataTable();
        chartData.addColumn('string', 'Day');
        chartData.addColumn('number', 'Visits');
        
        for(var i=0; i<data.length; i++) {
            var part = (data[i].DateViewed).split("/");
            var singleDay = part[1];
            chartData.addRow([ singleDay, parseInt(data[i].dailyVisit)]);
           }
        
        

        
        var options = {
                  title: 'June 2017 Visits',
                  colors: ['#FF8831'],
                  hAxis: {
                      title: 'Day',  
                      titleTextStyle: {color: '#333', bold: true}
                  },
                  vAxis: {
                      title: 'Number of Visits',
                      titleTextStyle: {color: '#333', bold: true},
                      minValue: 0
                  }
                };
                
        
        
        var chartArea = new google.visualization.AreaChart(document.getElementById("chartDiv"));
        chartArea.draw(chartData, options);
      
        }  
    })
    
    .fail(function (jqXHR) {
        
    })
    .always(function() {
        
    });
    
//service-chartCountryVisits.php
$.get("service-chartCountryVisits.php")
    .done(function (data) {
    console.log(data);
    //getting API
       google.charts.load('current', {'packages':['geochart'], 'mapApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'});
   //calls the draw regions map function
    google.charts.setOnLoadCallback(drawRegionsMap);
        
              function drawRegionsMap() {
                var mapData = new google.visualization.DataTable();
                mapData.addColumn('string', 'Country');
                mapData.addColumn('number', 'Visits');
                
                  
                  for(var i=0; i<data.length; i++) {
                      mapData.addRow([ data[i].CountryName, parseInt(data[i].visitCount)]);
                  }
                  
                var options = {
                    colorAxis: {colors: ['#FFECDD', '#FF8831']}
                };
                
                var chart = new google.visualization.GeoChart(document.getElementById('regionsDiv'));
                chart.draw(mapData, options);
    
                }
    })
    .fail(function (jqXHR) {
        console.log("Error: " + jqXHR.status);
    })
    .always(function() {
        
    });