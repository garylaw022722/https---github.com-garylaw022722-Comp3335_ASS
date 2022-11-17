
let app = angular.module('acDetails', []);
app.controller('ctrl', function($scope ,$http) {
  //declared data
  $scope.showEditForm =false;
  $scope.RevokeAllRole =false;
  $scope.pwd="";


  $scope.getAccount_Data = function(){
    $scope.data =JSON.stringify({"action":"getAC_data"})
    $http.post("AdminController.php" ,$scope.data)
    .then(function(response){
    
      $scope.content= response.data;
     
    })
    
  }

  $scope.updateRecord=function(){
    let updateTuple={"action":"updateProfile","usr_id":$scope.uid,"pwd":$scope.pwd ,"isRevokeAll":$scope.RevokeAllRole};
    
    $scope.data =JSON.stringify(updateTuple);
    $http.post("AdminController.php" ,$scope.data)
    .then(function(response){
      $scope.content= response.data;
      location.reload();

    })
  }


  $scope.openRegForm= function(){
    window.open('register.html', "_blank");
  
  }
  $scope.Edit_Data=function(index ,user_id){
    let profile = $scope.content[index];
    $scope.showEditForm = !$scope.showEditForm;
   
    $scope.uid=profile["user_id"]
    $scope.role =profile["acType"]
   


  }

  $scope.closeEdit_Form=function(){
    $scope.showEditForm= false;
    $scope.RevokeAllRole =false;
    $scope.pwd=""
  }


});


