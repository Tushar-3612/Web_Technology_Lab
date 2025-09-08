 
<?php
$name=$_POST["sname"];
$marks=$_POST["smarks"];

$conn=new mysqli("localhost","root","","info");
if($conn){
    $stat=$conn->prepare("insert into Userinfo (name,marks) values(?,?)");
    $stat->bind_param("si",$name,$marks);
    if($stat->execute()){
        echo"Data is inserte succesfully";
        
    }

}else{
    echo"Error in connection";
}

// i want to send response in json from php 
//1.prepare data 
//2. convert json 
//3. configure header 

$arr=["StudentName"=>$name,"StudentMArks"=>$marks];
$response=json_encode($arr);

?>
 