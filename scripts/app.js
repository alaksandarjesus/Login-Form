var myApp = angular.module("loginTest",['ngMessages']);

myApp.controller("userController",function($scope, $http){

    $scope.user = {username:'',password:''}
    $scope.message="";
    $scope.msgtype="";
    
    $scope.checklogin = function(credentials){
    
       $http.post("api/login.php",credentials)
       .success(function(data, status, headers, config){
       
                console.log(data);
           if(data.result){
                $scope.message = "Login Successful";
                $scope.msgtype = "success";
           }
           else {
                $scope.message = "Login Unsuccessful";
                $scope.msgtype = "danger";
           }
         });
        
    
    }
    
    

});