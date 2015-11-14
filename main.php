<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Main Page">
    <meta name="author" content="Michal Zegen">
    
    <!-- CSS files-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="dashboard.css" rel="stylesheet">

     <!--JS files-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="docs.min.js"></script>
    
    <!-- Custom CSS -->
    <style>
    	tr:not(.warning):not(.danger)
    	{
    		cursor:pointer;
    	}
    	.warning,.danger
    	{
    		cursor:not-allowed;
    	}
    </style>
    
    <!-- Custom JS-->
    <script type="text/javascript">
    	$(document).ready(function(){
    		
    		
    		$('tr:not(.warning,.danger)').click(function(){
    			
    			$('#myModal2').modal('show');
    		});
    		
    		
    		var a = 0;
    	 for(;a<10;a++)
    	 {
 			 var row = $("<tr>");
  				
  				row.append($("<td id='"+a+"'>"+a+"</td>"))
     			   .append($("<td>Text-2</td>"))
     			   .append($("<td>Text-3</td>"));
    
  			$("#table_elements").append(row);
        }
    		
    		$('#add_element').click(function(){
    			
    			$('#table_elements tr[class!="table_names"]').remove();
    			
    			$.ajax({
    				type:"POST",
    				url:"add_element.php",
    				dataType:"json",
    				data:
    				{
    					nazwa:document.getElementById("new_element").elements[0].value,
    					opis:document.getElementById("new_element").elements[1].value,
    					kategoria:document.getElementById("new_element").elements[2].value
    				},
    				success:function(msg)
    				{
    					alert(msg[1]);
    				},
    				complete:function(msg)
    				{
    					
    				},
    				error:function(msg)
    				{
    					$('#demo').val("error");
    				}
    				
    			});
    		});
    		
    		
    	});
    	
    	
    	
    </script>
</head>



<body>
	
	<!--Include templates-->
     <? 
     include("templates/add_element.html"); 
     include("templates/show_element.html");
     ?>
     
     
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ClusterStuff</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
         
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">Wypożyczone <span class="badge">0</span></a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Wyloguj</a></li>
          </ul>
          <form class="navbar-form navbar-right">
          	 <!-- Button trigger modal -->
 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
  Add
</button>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal2">
  check
</button>
            <input type="text" class="form-control" placeholder="Wyszukaj elementów...">  
          </form>
        </div>
      </div>
    </nav>
    
     

    

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Wszystko <span class="sr-only">(current)</span><span class="badge">0</span></a></li>
            <li><a href="#">Druk 3D <span class="badge">0</span></a></li>
            <li><a href="#">Elektronika <span class="badge">0</span></a></li>
            <li><a href="#">Mechanika <span class="badge">0</span></a></li>
            <li><a href="#">Narzędzia <span class="badge">0</span></a></li>
          </ul>
          <!--
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
          -->
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        	
 			
 
        	
          <h1 class="page-header"></h1>
          <div id="demo"></div>
          <h2 class="sub-header">Elementy</h2>
          <table id="tabElements">
          	
          </table>
          
          <div class="table-responsive">
            <table class="table table-hover" id="table_elements">
              <thead>
                <tr class="table_names">
                  <th>ID</th>
                  <th>Nazwa</th>
                  <th>Kategoria</th>
                
                </tr>
              </thead>
              <tbody>
                <tr class="danger">
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                 
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                 <td>odio</td>
                </tr>
                <tr class="warning">
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  
                  
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                 
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
               
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

   

</body>
</html>