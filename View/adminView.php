<?php
    include 'Model/configServer.php';
    include 'Model/consulSQL.php';
   // include './process/securityPanel.php';
?>
    <section id="prove-product-cat-config">
        <div class="container">
          <div class="page-header">
            <h1>Panel de administración <small class="tittles-pages-logo">COMERCIO ELECTRONICO</small></h1>
          </div>
          <!--====  Nav Tabs  ====-->
          <ul class="nav nav-tabs nav-justified" style="margin-bottom: 15px;">
            <li>
              <a href="adminView.php?view1=publicReport">
                <i class="fa fa-cubes" aria-hidden="true"></i> &nbsp; Publicaciones reportadas
              </a>
            </li>
            <li>
              <a href="adminView.php?view1=CategoriList">
                <i class="fa fa-truck" aria-hidden="true"></i> &nbsp; Lista de categorias 
              </a>
            </li>
            <li>
              <a href="adminView.php?view1=category">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i> &nbsp; Nueva categoria
              </a>
            </li>
          </ul>
          <?php
            $content1=$_GET['view1'];
            $WhiteList1=["publicReport","CategoriList","category"];
            if(isset($content1)){
              if(in_array($content1, $WhiteList1) && is_file($content1.".php")){
                include "../".$content1.".php";
              }else{
                echo '<h2 class="text-center">Lo sentimos, la opción que ha seleccionado no se encuentra disponible</h2>';
              }
            }else{
              echo '<h2 class="text-center">Para empezar, por favor escoja una opción del menú de administración</h2>';
            }
          ?>
        </div>
    </section>
 