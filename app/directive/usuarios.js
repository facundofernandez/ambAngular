
var app = angular.module('modDirUsuarios',[]);

app.directive("superman", function(){
  return {
   restrict: "A",
   link: function(scope, elem, attrs){
       //console.log("I'm working" , scope , elem[0] , attrs);
     }
  };
});



