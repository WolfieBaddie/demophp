<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $error = array();
            $fullName = trim($_REQUEST["fullName"]);
            $email = trim($_REQUEST["email"]);
            $age = trim($_REQUEST["age"]);
            
            $gender = $_POST['gender'];
            $MChecked = "";
            $FChecked = "";
            $OChecked = "";

            $checkBoxes = isset($_REQUEST['check']) ? $_REQUEST['check'] : null;



            //validate fullName
            if(empty($fullName)){
                $fullNameErr = "Truong fullName khong duoc de trong";
            }

            if(empty($fullName)){
                $error["fullName"]["required"] = "Truong fullName khong the de trong";
            }
            else{
                if(strlen($fullName) < 10){
                    $error["fullName"]["lenInvalid"] = "Truong fullName khong the nho hon 10 ky tu";
                }

            }

            if(empty($email)){
                $error["email"]["required"] = "Truong email khong the de trong";
            }
            else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error["email"]["invalid"] = "Truong email khong hop le";
                }
            }
            //Cach 1
            if (empty($email)){
                $error["email"]["required"] = "Truong email khong the de trong";
            }
            else{
                $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
                if(preg_match($regex, $email)){
                    echo $error["email"]["invalid"] = "Truong email hop le";
                }
                else {
                    $error["email"]["invalid"] = "Vui long nhap dung dinh dang email: example@gmail.com";
                }
            }


            if(empty($age)){
                $error["age"]["required"] = "Truong age khong the de trong";
            }
            else{
                if(is_int($age) == 0){
                    $error["age"]["isInt"] = "Truong age phai nhap so";
                    
                }
                else{
                    if($age < 18 && $age < 0){
                        $error["age"]["ageRestrict"] = "Tuoi nhap vao phai lon hon 18";
                    }
                }
                
            }

/*             if(empty($gender)){
                $error["gender"]["required"] = "Truong gender khong the de trong";
            }
            else{
                
                
                if ($gender == "male"){
                    $Mchecked = "Gioi tinh la nam";
                }
                else if($gender == "female") {
                    $Fchecked = "Gioi tinh la nu";
                }

                else{
                    $Ochecked = "Gioi tinh khong xac dinh";
                }
            }
 */
            //checkbox validate

/*             if (isset($_POST['Submit'])){
                $checkBoxes = 0;
                $values = $_POST['check'];
                $checkedBoxes = count($values);

                if($checkBoxes < 1){
                    echo "Chon it nhat mot checkbox";
                }
                else if ($checkBoxes >= 3){
                    echo "Chon toi da 3 checkbox";
                }
                }
                else {
                    echo 'Check boxes:' . var_dump($values); 
                }
 */
            //another method
            if(empty($checkBoxes)){
                $error["checkBoxes"]["required"] = "Vui long chon it nhat mot checkbox";
            }
            else{
                if(count($checkBoxes) > 2){
                    $error["checkBoxes"]["sizeInvalid"] = "Vui long chon nhieu nhat hai checkbox";
                }
            }

            if(empty($error)){
                header["localtion: ./demo.php"];
            }
        }

    ?>
</body>
</html>
<form method = "POST">
    
    <h1>
    <span>Nhap ten:</span> </br>
    <input type="text" name="fullName" placeholder="vui long nhap vao ten"></input>
    <?php echo empty($error["fullName"]["requried"]) ? "" : "<span style='color:red;'>" . $error["fullName"]["requried"] . "</span>"?>
    <?php echo empty($error["fullName"]["lenInvalid"]) ? "" : "<span style='color:red;'>" . $error["fullName"]["lenInvalid"] . "</span>"?>
    </h1>

    <h1>
    <span>Nhap email:</span> </br>
    <input type="text" name="email" placeholder="vui long nhap vao email"
    vale=<?php echo empty($error["email"]["required"])? "" 
    : "<span style:'color-red'>".$error["email"]["required"]."</span>"?>></input>
    <?php echo empty ($error["email"]["invalid"])? "" :
     "<span style:'color-red'>".$error["email"]["invalid"]."</span>"?>
    </h1>

    <h1>
    <span>Nhap tuoi:</span> </br>
    <input type="text" name="age" placeholder="vui long nhap vao tuoi"></input>
    <?php echo empty($error["age"]["required"])? "" : "<span style='color:red'>". $error["age"]["required"] . "</span>"?>
    <?php echo empty($error["age"]["isInt"])? "" : "<span style='color:red'>". $error["age"]["isInt"] . "</span>"?>
    <?php echo empty($error["age"]["ageRestrict"])? "" : "<span style='color:red'>". $error["age"]["ageRestrict"] . "</span>"?>
    </h1>

    <h1>
        <input type="checkbox" name="check[1]" value="check1" <?php echo isset($checkBoxes) 
        && in_array("check1", $checkBoxes)? "checked": ""?>>Check1</input>
        <input type="checkbox" name="check[2]" value="check2" <?php echo isset($checkBoxes) 
        && in_array("check2", $checkBoxes)? "checked": ""?>>Check2</input>
        <input type="checkbox" name="check[3]" value="check3" <?php echo isset($checkBoxes) 
        && in_array("check3", $checkBoxes)? "checked": ""?>>Check3</input>
        <?php echo empty($error["checkBoxes"]["required"])? "" : 
        "<span style='color:red'>". $error["checkBoxes"]["required"] . "</span>"?>
        <?php echo empty($error["checkBoxes"]["sizeInvalid"])? "" : 
        "<span style='color:red'>". $error["checkBoxes"]["sizeInvalid"] . "</span>"?>
    </h1>

    <h1>
        <input type=
        "radio" name="gender" value = "male"
        checked >male</input>
        <?php
           echo empty($gender) ? "checked" : ($gender == "male" ? "checked" : "")
        ?>
        <input type=
        "radio" name="gender" value = "female"
        <?php echo !empty($gender) && $gender = "female"? "checked" : ""?>
        >female</input>
        
        <input type=
        "radio" name="gender" value = "other"
        <?php echo !empty($gender) && $gender = "other"? "checked" : ""?>
        >other</input>
     
   

    </h1>

    <input type="submit" value="Submit"></input>
</form>