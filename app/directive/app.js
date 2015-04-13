
var app = angular.module('modDirApp',[]);

app.directive("msjError", function($timeout){
  return {
	restrict: "E",
	link: function(scope, elem, attrs){
        
    },
	templateUrl: 'app/directive/template/msjError.html'
  };
});

app.directive("grafico", function($timeout){
  return {
	restrict: "E",
	link: function(scope, elem, attrs){
        console.log("gr");
		    var chart;
            var arrow;
            var axis;

            AmCharts.ready(function () {
                // create angular gauge
                chart = new AmCharts.AmAngularGauge();
                chart.addTitle("Speedometer");

                // create axis
                axis = new AmCharts.GaugeAxis();
                axis.startValue = 0;
				axis.axisThickness = 1;
                axis.valueInterval = 10;
                axis.endValue = 220;
                // color bands
                var band1 = new AmCharts.GaugeBand();
                band1.startValue = 0;
                band1.endValue = 90;
                band1.color = "#00CC00";

                var band2 = new AmCharts.GaugeBand();
                band2.startValue = 90;
                band2.endValue = 130;
                band2.color = "#ffac29";

                var band3 = new AmCharts.GaugeBand();
                band3.startValue = 130;
                band3.endValue = 220;
                band3.color = "#ea3838";
                band3.innerRadius = "95%";

                axis.bands = [band1, band2, band3];

                // bottom text
                axis.bottomTextYOffset = -20;
                axis.setBottomText("0 km/h");
                chart.addAxis(axis);

                // gauge arrow
                arrow = new AmCharts.GaugeArrow();
                chart.addArrow(arrow);
				
                chart.write("chartdiv");
                // change value every 2 seconds
                setInterval(randomValue, 2000);
            });

            // set random value
            function randomValue() {
                var value = Math.round(Math.random() * 200);
                arrow.setValue(value);
                axis.setBottomText(value + " km/h");
            }

    },
	templateUrl: 'app/directive/template/grafico.html'
  };
});