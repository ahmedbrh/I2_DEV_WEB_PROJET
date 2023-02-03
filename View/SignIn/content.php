
<html>
  <head>
	<link href="Public/SignIn/css/SignIn_content.css" rel="stylesheet" type="text/css" />
  <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap"
      rel="stylesheet"
    />
  </head>

<body>

<h1> Sign in </h1>
<div id="signIn">
<!--Creation du premier formulaire de connexion en utilisant bootstrap-->
<div class="container" >
<form class="form-horizontal" action="Model/connexion.php" id="Formulaire-connexion" method="POST">
     <div class ="form-group">
          <label class="control-label col-sm-2"> Email:</label>
              <div class ="col-sm-8">
                    <input  type="email" class= "form-control" id="email1" name="email1">
              </div>
      </div>

<div class ="form-group">
    <label class="control-label col-sm-2"> Password:</label>
        <div class ="col-sm-8">
            <input  type="password" class= "form-control" id="password1" name="password1">
        </div>
</div>

<div class ="form-group">
    <div class ="col-sm-offset-2 col-sm-10">
        <button type ="submit" name="connexion" class="btn btn-default">Submit</button>
    </div>
</div>

<div class ="form-group">
    <label class="control-label col-sm-2"> Sign up for free:</label>
        <div class ="col-sm-offset-0 col-sm-6">
            <button name ="connexion" type ="button" id="createAccount" onclick="" class="btn btn-default">Create an account !</button>
        </div>
</div>

</form>

</div>


<!--Creation du deuxieme formulaire d'inscription en utilisant bootstrap-->
<div class="container">
<form  class="form-horizontal" action="Model/inscription.php" id="create-compte" method="POST">
  
<div class ="form-group">
    <label class="control-label col-sm-2"> Name:</label>
        <div class ="col-sm-8">
            <input  type="text" class= "form-control" id="name" name="name">
        </div>
</div>

<div class ="form-group">
      <label class="control-label col-sm-2"> Adresse Mail:</label>
          <div class ="col-sm-8">
              <input  type="email" class= "form-control" id="email2" name="email2">
          </div>
</div>

<div class ="form-group">
    <label class="control-label col-sm-2"> Password :</label>
        <div class ="col-sm-8">
              <input  type="Password" class= "form-control" id="password2" name="password2">
        </div>
</div>

<div class ="form-group">
    <label class="control-label col-sm-2" > Confirm Password :</label>
        <div class ="col-sm-8">
            <input  type="Password" class= "form-control" id="passwordconf" name="passwordconf">
        </div>
</div>

<div class ="form-group">
    <div class ="col-sm-offset-2 col-sm-6">
        <button name="inscription" type ="submit" onclick="" class="btn btn-secondary btn-block">Submit</button>
    </div>
</div>          

</form>

</div>

</div>

	    <script src ="Public/SignIn/scripts/script.js"></script> 
  </body>
  </html>