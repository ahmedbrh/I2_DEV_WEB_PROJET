<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="Public/Accueil/css/Accueil_content.css" rel="stylesheet" type="text/css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
<Script src="Public\Search\js\index.js"></Script>
    <!-- font awsome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
    

<!-- Search book ! -->
<div class="search">
<div class="row mt-5">
  <div class="col-md-6 m-auto">
    <div class="card card-body">
      <h1 class="text-center mb-4">
      Search a book here 
      </h1>


        <div class="form-group">
        
          <input
            type="text"
            id="search"
            name="search"
            class="form-control"
            placeholder="Ex: JavaScript , Machine learning , Python programming...!"
      
          />
        </div>
    
        <button type="submit" class="btn btn-secondary   btn-block py-2.5 mb-4" onclick="renderBooks() ;
">
          Search
        </button>
  
    </div>
  </div>
</div>
</div>
<div id="book-list"></div>


</body>
</html>