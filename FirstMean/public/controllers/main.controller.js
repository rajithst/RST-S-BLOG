/**
 * Created by rajith on 2/19/17.
 */

var app = angular.module('myfirstmean', []);

app.controller('addcontrolle',function ($scope,$http) {

    $scope.addData = function () {
        $http.post("/insertData",$scope.user).then(function(response){

           if(response){ 
            $scope.success = "Saved";
           } else {
               $scope.error = "Error";
           }
        })

    }

});



