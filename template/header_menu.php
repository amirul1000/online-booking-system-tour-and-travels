 
 
    <div class="navbar-more-overlay"></div>
	<nav class="navbar navbar-inverse navbar-fixed-top animate">
		<div class="container navbar-more visible-xs">
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">Submit</button>
						</span>
					</div>
				</div>
			</form>
			<ul class="nav navbar-nav">
				<li>
					<a href="blog.html">
						<span class="menu-icon fa fa-picture-o"></span>
						Blog
					</a>
				</li>
				
				<li>
					<a href="login.php">
						<span class="menu-icon fa fa-bell-o"></span>
						Log In
					</a>
				</li>
				<li>
					<a href="login.php?cmd=register_view">
						<span class="menu-icon fa fa-picture-o"></span>
						Registration
					</a>
				</li>
				<li>
					<a href="#">
						<span class="menu-icon fa fa-phone"></span>
						+1 456 6717
					</a>
                    
				</li>
				<li>
					<a href="#">
						<span class="menu-icon fa fa-envelope-o"></span>
						info@xxx.com
					</a>
				</li>

			
				
			</ul>
		</div>
		<div class="container">
			<div class="navbar-header hidden-xs">
				<a class="site-logo" href="index.php"><img src="" alt="Logo"></a>
			</div>

			<ul class="nav navbar-nav navbar-right mobile-bar">
				<li>
					<a  href="index.php" class="hvr-underline-from-center">
						<span class="menu-icon fa fa-home"></span>
						Home
					</a>
				</li>
				<li>
					<a  href="transfer_all.php?cmd=list" class="hvr-underline-from-center">
						<span class="menu-icon fa fa-taxi"></span>
						<span class="hidden-xs">Transfers</span>
						<span class="visible-xs">Transfers</span>
					</a>
                    <!--<ul class="dropdown-menu">
                <?php
						 unset($info);
						$info["table"] = "airport";
						$info["fields"] = array("airport.*"); 
						$info["where"]   = "1 ORDER BY airport_name ASC";
						$arrairport =  $db->select($info);
						
						 unset($info);
						$info["table"] = "city";
						$info["fields"] = array("city.*"); 
						$info["where"]   = "1 ORDER BY city_name ASC";
						$arrcity =  $db->select($info);
				?>
				<?php
					for($i=0;$i<count($arrairport);$i++)
					  {
                ?>
                <li><a href=""><?=$arrairport[$i]['airport_name']?></a></li>
                <?php
					  }
				  ?>	 
                  <?php
					for($i=0;$i<count($arrcity);$i++)
					  {
				  ?>
					 <li><a href=""><?=$arrcity[$i]['city_name']?></a></li>
				  <?php
					  }
				  ?>	              
              </ul>-->
              
				</li>
				<li >
					<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="hvr-underline-from-center">
						<span class="menu-icon fa fa-ship"></span>
						Tours 
					</a>
                    <ul class="dropdown-menu">
                 <?php
					 unset($info);
					$info["table"] = "excursion_zone";
					$info["fields"] = array("distinct(excursion_zone.zone_name) as zone_name"); 
					$info["where"]   = "1 ORDER BY excursion_name ASC";
					$arrzone =  $db->select($info);
					
					 unset($info);
					$info["table"] = "excursion_zone";
					$info["fields"] = array("excursion_zone.excursion_name"); 
					$info["where"]   = "1 ORDER BY excursion_name ASC";
					$arrexcursion =  $db->select($info);
				  ?>
                  <li><a href="tour_all.php?cmd=list">All</a></li> 	
                 <?php
					for($i=0;$i<count($arrzone);$i++)
					  {
				  ?>
                     <li ><a href="tour_all.php?cmd=list&excursion_zone=<?=$arrzone[$i]['zone_name']?>"><?=$arrzone[$i]['zone_name']?></a></li>
				  <?php
					  }
				  ?>
                   <?php
					for($i=0;$i<count($arrexcursion);$i++)
					  {
				  ?>
					<li ><a href="tour_all.php?cmd=list&excursion_city=<?=$arrexcursion[$i]['excursion_name']?>"><?=$arrexcursion[$i]['excursion_name']?></a></li>
				  <?php
					  }
				  ?>	  
              </ul>
				</li>
				<li class=" hidden-xs">
					<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="hvr-underline-from-center">
						<span class="menu-icon fa fa-picture-o"></span>
						Blog 
					</a>
                    <ul class="dropdown-menu">
                <li class="active"><a href="blog.html">Blog</a></li>
                <li><a href="blog-item.html">Blog Item</a></li>
              </ul>
				</li>
                
               
				
				<li >
					<a href="contact.php" class="hvr-underline-from-center">
						<span class="menu-icon fa fa-phone"></span>						
						<span class="hidden-xs">Contact Us</span>
						<span class="visible-xs">Contact</span>
					</a>
				</li>
                
                <li class="hidden-xs">
					<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" class="hvr-underline-from-center">
						<span class="menu-icon fa fa-search"></span>
						Search
					</a>
                    <ul class="dropdown-menu">
                    
                    
                          <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="search.php">
                  <div class="input-group">
                    <input type="text" name="searchKey" value="<?=$_SESSION['searchKey']?>" placeholder="Search" class="form-control" required>
                    <span class="input-group-btn">
                      <input type="hidden" name="cmd" value="search" />
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
                    
                    
                    </ul>
				</li>
                
				<li class="visible-xs">
					<a href="#navbar-more-show">
						<span class="menu-icon fa fa-bars"></span>
						More
					</a>
				</li>
			</ul>
		</div>
	</nav>
    
       
       
       
       
       
       
       