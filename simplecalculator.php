<?php
$cookie_name1 = "num";
$cookie_value1="";
$cookie_name2 = "op";
$cookie_value2="";

    if (isset($_POST['num']))
    {
        if($_POST['num'] == '+/-')
        {
            if(is_numeric($_POST['input']))
                {
                    $num = $_POST['input'] * -1;
                }
            else
            {
                $num = isset($_POST['input']) ?$_POST['input'] : "";

            }


        }
        else
            {
                $current_input = (isset($_POST['input']) && $_POST['input'] != "Error") ? $_POST['input'] : "";

                $num = $current_input . $_POST['num'];
                
            }

    }
    else
        {
            $num= "";
        }

    if(isset($_POST['op']))
    {
        if($_POST['op']=='C')
            {
                $num="";
                setcookie('num','',time() - 3600 ,'/');
                setcookie('op','',time() - 3600 ,'/');
               if (isset($_COOKIE['num'])) unset($_COOKIE['num']);
               if(isset($_COOKIE['op'])) unset($_COOKIE['op']);
               
            }

    
    else {
        $cookie_value1=$_POST['input'];
        setcookie($cookie_name1,$cookie_value1,time()+(86400*30),"/");
        $cookie_value2=$_POST['op'];
        setcookie($cookie_name2,$cookie_value2,time()+(86400*30),"/");
        $_COOKIE['num'] = $cookie_value1;
        $_COOKIE['op'] = $cookie_value2;
        
        $num="";

    }
    }
    if(isset($_POST['equal']))
        {
            $num=isset($_POST['input']) ? $_POST['input'] : 0;
            $stored_num = isset($_COOKIE['num']) ? $_COOKIE['num'] : 0;
            $op = isset($_COOKIE['op']) ? $_COOKIE['op'] : '';
            
            switch($op)
            {
            case"+":
            $result= $stored_num + $num;
            break;
            case"-":
            $result= $stored_num - $num;
            break;
            case"*":
            $result= $stored_num * $num;
            break;
            case"÷":
            case"/":   
            if($num != 0)
                {
            $result= $stored_num / $num;
                }
                else
                    {
                    $result = "Error";
                    }      
                  break;
            case"%":
                if($num != 0)
               {
            $result= $stored_num % $num;
             }
             else
                 {
                    $result = "Error";
                 }  

                
            break;
            default:
            $result = $num;
            break;
           
            }
           $num =  $result;


           setcookie('num','',time() - 3600 ,'/');
                   setcookie('op','',time() - 3600 ,'/');
                  if (isset($_COOKIE['num'])) unset($_COOKIE['num']);
                  if(isset($_COOKIE['op'])) unset($_COOKIE['op']);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="simplecalculator.css">
</head>
<body>
<div class="calc">
    <form action="" method="post">
        <input type="text" class="maininput" name="input" value="<?php echo htmlspecialchars($num); ?>" readonly>        
        <input type="submit" class="clear"name="op" value="C">
        <input type="submit" class="calbtn"name="op" value="/">
        <input type="submit" class="calbtn"name="op" value="%">
        <input type="submit" class="calbtn"name="op" value="÷">
        <input type="submit" class="numbtn"name="num" value="7">
        <input type="submit" class="numbtn"name="num" value="8">
        <input type="submit" class="numbtn"name="num" value="9">
        <input type="submit" class="calbtn"name="op" value="*">
        <input type="submit" class="numbtn"name="num" value="4">
        <input type="submit" class="numbtn"name="num" value="5">
        <input type="submit" class="numbtn"name="num" value="6">
        <input type="submit" class="calbtn"name="op" value="-">
        <input type="submit" class="numbtn"name="num" value="1">
        <input type="submit" class="numbtn"name="num" value="2">
        <input type="submit" class="numbtn"name="num" value="3">
        <input type="submit" class="calbtn"name="op" value="+">
        <input type="submit" class="numbtn"name="num" value="+/-">
        <input type="submit" class="numbtn"name="num" value="0">
        <input type="submit" class="numbtn"name="num" value=".">
        <input type="submit" class="equal" name="equal" value="=">

    </form>
</div>
</body>
</html>