 <?php
$name=$_POST["sname"];
$marks=$_POST["smarks"];

$conn=new mysqli("localhost","root","","info");
if($conn){
    $stat=$conn->prepare("insert into userinfo (Name, Mark) values(?, ?)");
    $stat->bind_param("si",$name,$marks);
    if($stat->execute()){
        echo "Data is inserted successfully";
    }
}else{
    echo "Error in connection";
}

$arr=["StudentName"=>$name,"StudentMarks"=>$marks];
$response=json_encode($arr);
echo $response;
?>
