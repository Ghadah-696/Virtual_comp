</div>
            
        </div>
        </div>
        <div class="row">
        <div class=" col-12">
            <footer class="fotbord bgf text-center">
                <div class="row">
                <div class="col-12 col-md-4">
                <!-- Link footer -->
                    <?php
                    
                    $hom_en="Home";
                    $hom_ar="الرئيسية";
                    $serv_en="Services";
                    $serv_ar="الخدمات";
                    $pro_en="Products";
                    $pro_ar="المنتجات";
                    $bran_en="Branches";
                    $bran_ar="الفروع";
                    $test_en="Testimonies";
                    $test_ar="الشهادات";
                    
                    ?>
                    
                    
                    <div class="bf-foot-nav">
            <div>
              
              <ul class="nav-tabs navbar-nav mr-auto mt-2 mt-lg-0 bf-foot-nav-list">
                  <li class="nav-item">
                      <a class="nav-link" href="index.php">
                  
                  <?php    
    if($lng=="en")
    
              { 
                    echo $hom_en;
    
              }
        else
        {
             echo '<link rel="stylesheet" href="css/rtl.css">';
             echo $hom_ar;
        }
    ?>
    
    <span class="sr-only">(current)
</span>
</a>
</li>
     <li class="<?php if($page=="services.php"){echo "active";} ?> nav-item">
    <a data-scroll class="nav-link" href="services.php"><?php if($lng=="en")
    
              { 
                echo $serv_en;
            }
        else
        {
             echo '<link rel="stylesheet" href="css/rtl.css">';
            echo $serv_ar;
        }
        ?></a>
</li>
   
   <li class="<?php if($page=="products.php"){echo "active";} ?> nav-item">
    <a  data-scroll class="nav-link" href="products.php"><?php if($lng=="en")
    
              { 
                echo $pro_en;
            }
        else
        {
             echo '<link rel="stylesheet" href="css/rtl.css">';
            echo $pro_ar;
        }
        ?></a>
</li>
     <li class="<?php if($page=="branches.php"){echo "active";} ?> nav-item">
    <a data-scroll  class="nav-link" href="branches.php"><?php if($lng=="en")
    
              { 
                echo $bran_en;
            }
        else
        {
             echo '<link rel="stylesheet" href="css/rtl.css">';
            echo $bran_ar;
        }
        ?></a>
</li>
     
                  <?php
    
       $res= $cn->query("SELECT pg_id ,pg_titl,pgt_ar FROM `pages` WHERE pg_stat='active' ORDER BY pg_id DESC;" );
        while($row=$res->fetch_assoc())
        {
            if($lng=="en")
    {
            echo ' <li class="nav-item">
                <a class="t nav-link" href="pages.php?lang='.$lng.'&id='.$row["pg_id"].'">'.$row["pg_titl"].'</a>
            </li>';
            
        }
            else
            {
                echo ' <li class="nav-item">
                <a class="t nav-link" href="pages.php?lang='.$lng.'&id='.$row["pg_id"].'">'.$row["pgt_ar"].'</a>
            </li>';
            
            }
        }
                
              ?>
                </ul>
            </div>
             
          </div>
                    
                </div>
                    <div class="pos col-12 col-md-4">
                <!-- Social Media Icons -->
                        <div class="bf-foot-social socialf footdis">
                    <!-- <a class="bf-foot-social-fb"  href="https://www.facebook.com/blaustern_fotografie/">
                     <img class="cHehIi" src="pct_static/facebooklogo.png">
                    </a> -->
                    <a class="bf-foot-social-fb " href="https://www.facebook.com/bufferapp" target="_blank" rel="noopener" aria-label="Facebook"><svg width="16" height="31" viewBox="0 0 16 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.3 30.7v-14H15l.7-5.5h-5.4V7.8c0-1.6.4-2.7 2.7-2.7h3V.2C14.6.1 13.2 0 11.8 0c-4.2 0-7 2.5-7 7.2v4H0v5.5h4.7v14h5.6z"></path>
                        </svg></a>
                    <a class="bf-foot-social-ig " href="https://instagram.com/buffer" target="_blank" rel="noopener" aria-label="Instagram"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M16 2.881c4.275 0 4.781.019 6.462.094 1.563.069 2.406.331 2.969.55a4.952 4.952 0 0 1 1.837 1.194 5.015 5.015 0 0 1 1.2 1.838c.219.563.481 1.412.55 2.969.075 1.688.094 2.194.094 6.463s-.019 4.781-.094 6.463c-.069 1.563-.331 2.406-.55 2.969a4.94 4.94 0 0 1-1.194 1.837 5.02 5.02 0 0 1-1.837 1.2c-.563.219-1.413.481-2.969.55-1.688.075-2.194.094-6.463.094s-4.781-.019-6.463-.094c-1.563-.069-2.406-.331-2.969-.55a4.952 4.952 0 0 1-1.838-1.194 5.02 5.02 0 0 1-1.2-1.837c-.219-.563-.481-1.413-.55-2.969-.075-1.688-.094-2.194-.094-6.463s.019-4.781.094-6.463c.069-1.563.331-2.406.55-2.969a4.964 4.964 0 0 1 1.194-1.838 5.015 5.015 0 0 1 1.838-1.2c.563-.219 1.412-.481 2.969-.55 1.681-.075 2.188-.094 6.463-.094zM16 0c-4.344 0-4.887.019-6.594.094-1.7.075-2.869.35-3.881.744-1.056.412-1.95.956-2.837 1.85a7.833 7.833 0 0 0-1.85 2.831C.444 6.538.169 7.7.094 9.4.019 11.113 0 11.656 0 16s.019 4.887.094 6.594c.075 1.7.35 2.869.744 3.881.413 1.056.956 1.95 1.85 2.837a7.82 7.82 0 0 0 2.831 1.844c1.019.394 2.181.669 3.881.744 1.706.075 2.25.094 6.594.094s4.888-.019 6.594-.094c1.7-.075 2.869-.35 3.881-.744 1.05-.406 1.944-.956 2.831-1.844s1.438-1.781 1.844-2.831c.394-1.019.669-2.181.744-3.881.075-1.706.094-2.25.094-6.594s-.019-4.887-.094-6.594c-.075-1.7-.35-2.869-.744-3.881a7.506 7.506 0 0 0-1.831-2.844A7.82 7.82 0 0 0 26.482.843C25.463.449 24.301.174 22.601.099c-1.712-.081-2.256-.1-6.6-.1z"></path>
                            <path d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219A8.221 8.221 0 0 0 16 7.781zm0 13.55a5.331 5.331 0 1 1 0-10.663 5.331 5.331 0 0 1 0 10.663zM26.462 7.456a1.919 1.919 0 1 1-3.838 0 1.919 1.919 0 0 1 3.838 0z"></path>
                        </svg>
                    </a>
                    <!-- Twiter icon -->
                    <a class="bf-foot-social-tw " href="https://twitter.com/buffer" target="_blank" rel="noopener" aria-label="Twitter"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M30.063 7.313c-.813 1.125-1.75 2.125-2.875 2.938v.75c0 1.563-.188 3.125-.688 4.625a15.088 15.088 0 0 1-2.063 4.438c-.875 1.438-2 2.688-3.25 3.813a15.015 15.015 0 0 1-4.625 2.563c-1.813.688-3.75 1-5.75 1-3.25 0-6.188-.875-8.875-2.625.438.063.875.125 1.375.125 2.688 0 5.063-.875 7.188-2.5-1.25 0-2.375-.375-3.375-1.125s-1.688-1.688-2.063-2.875c.438.063.813.125 1.125.125.5 0 1-.063 1.5-.25-1.313-.25-2.438-.938-3.313-1.938a5.673 5.673 0 0 1-1.313-3.688v-.063c.813.438 1.688.688 2.625.688a5.228 5.228 0 0 1-1.875-2c-.5-.875-.688-1.813-.688-2.75 0-1.063.25-2.063.75-2.938 1.438 1.75 3.188 3.188 5.25 4.25s4.313 1.688 6.688 1.813a5.579 5.579 0 0 1 1.5-5.438c1.125-1.125 2.5-1.688 4.125-1.688s3.063.625 4.188 1.813a11.48 11.48 0 0 0 3.688-1.375c-.438 1.375-1.313 2.438-2.563 3.188 1.125-.125 2.188-.438 3.313-.875z"></path>
                        </svg></a>
                    <!-- <a  href="https://www.gmail.com/blaustern_fotografie/">
                     <img class="cHehIi" src="pct_static/Gmail_logo-1.jpg">
                    </a> 
                       <a  href="https://www.inistgram.com/blaustern_fotografie/">
                     <img class="cHehIi" src="pct_static/twlogo.png">
                    </a> -->
                            
                    </div>
                        <div class="col-6 col-md-4">
                            </div>
                        <?php
        // include google map
    $res=$cn->query("SELECT  br_lan,br_log FROM `branches` WHERE  b_stat='active' limit 1");
        while($row=$res->fetch_assoc())
{
        if(isset($row["br_lan"]) && isset($row["br_log"]))
            {
              echo  "<div><iframe width='100%'  class='embed-responsive-item'  src='https://maps.google.com/maps?q=".$row["br_lan"].",".$row["br_log"]."&amp;&z=17&amp&ie=UTF8&iwloc=&output=embed' > </iframe></div>";
            }}
       ?>
                        
                        
                    </div>   
                
                    <div class="col-12 col-md-4">
                 <img class="lozad" src="pct_static/logo2.png" alt="Electronics Worlds">
                </div>
                </div>
                <div class="fotbordc mrgfoot">
                 
                <?php
                    
                    if($lng=="en")
                    {
                        echo "All Right Reserved By Electronics Worlds &copy;";
                    }
                    else
                    {
                        echo "جميع الحقوق محفوظه لدى شركة عوالم الإلكترونيات  &copy;";
                    }
                    echo date("Y");
                    ?>
                
                </div>
            
            </footer>
            
            
        </div>
        </div>

    </div>
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/public.js"></script>
<script src="js/nav.js"></script>

</body>
</html>