
 <?php include_once "partial/header.php"?>
    
   
    
<style>
     body {
  background:linear-gradient(to right, #78a7ba 0%, #385D6C 50%, #78a7ba 99%);
}
    .signup-form {
        font-family: "Roboto", sans-serif;
        width:400px;
        height: 300px;
        margin:30px auto;
        background:linear-gradient(to right, #ffffff 0%, #fafafa 50%, #ffffff 99%);
        border-radius: 10px;
        
    }
    .form-header h1 {
            font-size: 30px;
            text-align:center;
            color:#666;
            padding:20px 0;
            border-bottom:1px solid #cccccc;
}
.form-header  {
  background-color: #EFF0F1;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.form-body .form-input {
    font-size: 17px;
    box-sizing: border-box;
    width: 100%;
    height: 34px;
    padding-left: 10px;
    padding-right: 10px;
    color: #333333;
    text-align: left;
    border: 1px solid #d6d6d6;
    border-radius: 4px;
    background: white;
    outline: none;
}
.label-title {
  
  color:#1BBA93;
  font-size: 17px;
  font-weight: bold;
}
.form-body {
  padding:10px 40px;
  color:#666;
}
.btn-1 {
    margin-left:95px;
    margin-top: 10px;
    text-align: center;
    width: 80px;
    float: left;
    text-decoration: none;
   /* display:inline-block; */
   padding:10px 20px;
   background-color: #1BBA93;
   font-size:17px;
   border:none;
   border-radius:5px;
   color:#bcf5e7;
   cursor:pointer;
}
.btn-1:hover {
  background-color: #169c7b;
  color:white;
}

</style>
<body>
  
    
       
       <form class="signup-form" action="" method="post">

     
                <div class="form-header">
                    <h1>Comic Sender</h1>
                </div>

      
            <div class="form-body">

                

                
                
                    <div>
                       <a href="registration/register.php" id="Signin" class="btn-1">Register</a>

                    </div>
                    <br>
                    <br>
                    <div>
                        <a href="login/login.php" id="Signin" class="btn-1">Login</a>
                    </div>
                
                </div>
            
        </form>
    
    

</html>










