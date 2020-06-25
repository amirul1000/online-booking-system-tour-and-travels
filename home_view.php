
    <?php
	  include("template/header.php");
	?>
   <script language="javascript">
    function filleEcursion(value)
	{
		objselect = document.getElementById("excursion_city");
		objselect.options.length = 0;
		$("#spinner2").html('<img src="images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  url: 'index.php?cmd=excursion&zone_name='+value,
		  success: function(data) {
				  var obj = eval(data);
				  if(value=="all")
				  {
				    objselect.add(new Option('-- Select Excursion  --',''), null);
				  }
				  for(var i=0;i<obj.length;i++)
				  {
					 objselect.add(new Option(obj[i].excursion_name,obj[i].excursion_name), null);
				  }
				$("#spinner2").html('');
			  }
			});
	}
   
   </script>
   
   <div class="main">
      <div class="container">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Excursiones & Transfers</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-12 col-sm-12">
                  <div class="row">
                     <div class="col-md-6 col-sm-6">
                        <!-- TABS -->
                          <div class="col-md-12 tab-style-1">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab-1" data-toggle="tab">Transfer</a></li>
                              <li><a href="#tab-2" data-toggle="tab">Tours</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane row fade in active" id="tab-1">
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
									
									 unset($info);
									$info["table"] = "transfer_type";
									$info["fields"] = array("transfer_type.*"); 
									$info["where"]   = "1 ORDER BY transfer_name ASC";
									$arrtransfer =  $db->select($info);
								?>
                                <form action="transfer.php" method="get">
                                    <div class="form-group">
                                         <i class="fa fa-map-marker"></i> 
                                         <label><b>Leaving from:</b></label><br>
                                         <select name="source" id="source" class="form-control">
                                            <option selected="" value="">Select Airport or City</option>
                                            <optgroup label="Airports">
                                              <?php
                                                for($i=0;$i<count($arrairport);$i++)
                                                  {
                                              ?>
                                                <option value="<?=$arrairport[$i]['airport_name']?>"><?=$arrairport[$i]['airport_name']?></option>
                                              <?php
                                                  }
                                              ?>	  
                                            </optgroup>
                                            <optgroup label="Cities">
                                                <?php
                                                for($i=0;$i<count($arrcity);$i++)
                                                  {
                                              ?>
                                                <option value="<?=$arrcity[$i]['city_name']?>"><?=$arrcity[$i]['city_name']?></option>
                                              <?php
                                                  }
                                              ?>	  
                                            </optgroup>
                                         </select>
                                     </div>    
                                    
                                    <div class="form-group">   
                                         <i class="fa fa-map-marker"></i> 
                                         <label><b> Going To: </b></label><br>
                                         <select  name="destination" id="destination" class="form-control">
                                         <option selected="" value="">Select Airport or City </option>
                                            <optgroup label="Airports">
                                              <?php
                                                for($i=0;$i<count($arrairport);$i++)
                                                  {
                                              ?>
                                                <option value="<?=$arrairport[$i]['airport_name']?>"><?=$arrairport[$i]['airport_name']?></option>
                                              <?php
                                                  }
                                              ?>	  
                                            </optgroup>
                                            <optgroup label="Cities">
                                                <?php
                                                for($i=0;$i<count($arrcity);$i++)
                                                  {
                                              ?>
                                                <option value="<?=$arrcity[$i]['city_name']?>"><?=$arrcity[$i]['city_name']?></option>
                                              <?php
                                                  }
                                              ?>	  
                                            </optgroup>
                                         </select>
                                     </div>
                                  
                                    <div class="form-group"> 
                                      <i class="fa fa-check-circle"></i>
                                      <label> <b> Transfer Type: </b>  </label><br>
                                      <select name="transfer_type" id="transfer_type" class="form-control">
                                        <option value="">Select Transfer Type</option>
                                         <?php
                                            for($i=0;$i<count($arrtransfer);$i++)
                                              {
                                          ?>
                                            <option value="<?=$arrtransfer[$i]['transfer_name']?>"><?=$arrtransfer[$i]['transfer_name']?></option>
                                          <?php
                                              }
                                          ?>	  
                                      </select> 
                                    </div>
                                    
                                    <div class="form-group"> 
                                      <i class="fa fa-check-circle"></i>
                                      <label> <b> Passengers:</b>  </label><br>
                                      <select name="passengers" id="passengers" class="form-control">
                                        <option value="">Select Passengers</option>
                                        <?php
                                         for($i=1;$i<=50;$i++)
                                         {
                                        ?>
                                          <option value="<?=$i?>"><?=$i?></option>
                                        <?php
                                         }
                                        ?>
                                      </select> 
                                    </div>
                                    
                                    <div class="form-group"> 
                                      <input type="hidden" name="cmd" value="transfer">  
                                      <input type="submit" class="btn blue" value="search &amp; Book">
                                    </div>  
                                </form>  
                              </div>
                              <div class="tab-pane row fade" id="tab-2">
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
                                  <form action="tour.php" method="get">
                                      <div class="form-group"> 
                                      <i class="fa fa-map-marker"></i> 
                                      <label> <b> Excursion Zone: </b>  </label><br>
                                      <select name="excursion_zone" id="excursion_zone" class="form-control" onChange="filleEcursion(this.value);">
                                        <option value="all">All our Tours</option>
                                         <?php
                                            for($i=0;$i<count($arrzone);$i++)
                                              {
                                          ?>
                                            <option value="<?=$arrzone[$i]['zone_name']?>"><?=$arrzone[$i]['zone_name']?></option>
                                          <?php
                                              }
                                          ?>	  
                                          </select> 
                                          <div id="spinner2"></div>
                                        </div>
                                        
                                      <div class="form-group"> 
                                          <i class="fa fa-map-marker"></i> 
                                          <label> <b> Excursion Name: </b>  </label><br>
                                          <select name="excursion_city" id="excursion_city" class="form-control">
                                            <option value="">-- Select Excursion  --</option>
                                             <?php
                                                for($i=0;$i<count($arrexcursion);$i++)
                                                  {
                                              ?>
                                                <option value="<?=$arrexcursion[$i]['excursion_name']?>"><?=$arrexcursion[$i]['excursion_name']?></option>
                                              <?php
                                                  }
                                              ?>	  
                                          </select>                                      
                                        </div>
                                        
                                      <div class="form-group"> 
                                          <input type="hidden" name="cmd" value="tour">   
                                          <input type="submit" class="btn blue" value="Go" action="">
                                        </div>  
                                  </form>
                              </div>
                            </div>
                          </div>
                          <!-- END TABS -->
                     </div>
                     <div class="col-md-6 col-sm-6">
                       <div class="col-md-12 col-sm-12">
                     	<!-- testing this section-->
<aside class="container-fluid col-6 slider">

<div>
  <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/9mubBpD_DGc?autoplay=1;rel=0' frameborder='0' allowfullscreen></iframe>
</aside>
</section>




      
    </aside>
    </section>

<!--end testing this section-->

<!-- testing this section-->
<aside class="container-fluid col-6 slider">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/transfers-slide1.jpg" alt="...">
      <div class="carousel-caption">
        Un ejemplo de texto
      </div>
    </div>
    <div class="item">
      <img src="images/transfers-slide2.jpg" alt="...">
      <div class="carousel-caption">
        Un ejemplo de texto
      </div>
    </div>

    <div class="item">
      <img src="images/transfers-slide3.jpg" alt="...">
      <div class="carousel-caption">
        Un ejemplo de texto
      </div>
    </div>
    Un ejemplo de texto
  </div>



  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
</div>
<ul class="transferslist">
<li>Private transfers</li>
<li>Luxury transfers</li>
<li>Shared transfers</li>
</ul>
</aside>
</section>




      
    </aside>
    </section>

<!--end testing this section-->
                       </div>
                     </div>
                    
                  </div>
                         
                </div>
                <!-- END LEFT SIDEBAR -->
                         
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    
    <?php
	  include("template/footer.php");
	?>
   