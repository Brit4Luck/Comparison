<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>about us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
         form{  
  display: block;  
  left: 30%;  
  position: absolute;  
  top: 30%;  
}  
        input[type=search]{  
    border: 5px  black;  
    box-sizing: content-box;  
    font-size:1em;  
    height: 2em;  
    margin-left: 10vw;  
    padding: .5em;  
    transition: all 2s ease-in;  
    width: 30vw;  
    z-index:1;  
    &:focus {  
      border: solid 3px #09f;        
      outline: solid #fc0 2000px;  
    }  
  } 
  .card-image{
    transition: 0.4s;
    
}

.card-image:hover{
    box-shadow: 0 10px 6px 6px #777;
}
.card .card-description{
    padding: 0 8px;
}

.card-meta-blogpost{
    color: #333;
    font-size: 14px;
    padding: 16px;
    font-family: 'Roboto Slab', serif;
}
.card-meta-blogpost a{
    color: #333;
}
  footer{
    background: black;
    padding: 8px;
    color: #eee;
    display: flex;
}
footer a{
    color: white;
}
footer #left-footer{
    flex: 1;
    border-right: 1px solid cyan;
    padding-left: 32px;
}
footer #left-footer ul{
    padding: 0;
    list-style: none;
    line-height: 1.5;
}
footer #right-footer{
    flex: 2;
    padding: 8px;
    text-align: center;
}
footer #social-media-footer a .fa-facebook,
footer #social-media-footer a .fa-youtube,
footer #social-media-footer a .fa-twitter {
  color: white;
  transition: 0.4s;
}

footer #social-media-footer ul {
  display: flex;
  list-style: none;
  justify-content: center;
  padding: 0;
}

footer #social-media-footer ul li {
  font-size: 48px;
  padding: 16px;
  transition: 0.4s;
}

footer #social-media-footer ul li:hover a .fa-youtube {
  color: red;
}

footer #social-media-footer ul li:hover a .fa-facebook {
  color: #3b5998;
}

footer #social-media-footer ul li:hover a .fa-twitter {
  color: rgb(4, 114, 216);
}

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item m-4">
          <a class="nav-link btn btn-success" href="./index.php">Home</a>
        </li>
        <li class="nav-item m-4">
          <a class="nav-link btn btn-danger" href="./about.php">About</a>
        </li>
        <li class="nav-item m-4">
          <a class="nav-link btn btn-warning" href="./views/home.php">Product</a>
        </li>
        <li class="nav-item m-4">
          <a class="nav-link btn btn-primary" href="./views/auth/login.php">login</a>
        </li>
        <li class="nav-item m-4">
          <a class="nav-link btn btn-primary" href="./order.php">order</a>
        </li>
        <li class="nav-item m-4">
        <form>   
<input type="search" placeholder="Search here"/>  
</form> 
        </li>
      
      </ul>

    </div>
  </div>
</nav>
<main>
   <h2 class="page-heading">ABOUT US</h2>
   <div id="post-container">
    <section id="blogpost">
        <div class="card">
          
           <!-- <div class="card-image">
            <img src="shop.jpg" alt="Card Image">
           </div> -->
           <div class="card-description">
            <h3>Origin</h3>
            <p>
                The main aim of developing this website was to ensure that customers can compare same phones from different companies then 
                be able to filter in accordance to their specification. That way it would save them time and also made their work easier.
               </p>
               <h3>Mission</h3>
               <p>
              To be the lead marketing company there would ever be
               </p>
               <h3>vision</h3>
               <p>
                To offer every customer satisfaction from our products by offering quality and quantity products.
               </p>
           </div>
         
        </div>
  
   </div>

            <footer>
                <div id="left-footer">
                    <h3>Quick Links</h3>
                    <p>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="bloglist.html">Blogs</a>
                            </li>
                            <li>
                                <a href="project.html">Projects</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </p>
                </div>

                <div id="right-footer">
                    <h3>Follow us on</h3>
                    <div id="social-media-footer">
                        <u>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        </u>
                   
            </footer>
    </main>
    <script src="main.js"></script>
</body>
</html>