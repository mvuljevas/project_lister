<?php

//Clean URL from dots for security
function cleanURL($string){
 $string = htmlentities($string);
 $string = str_replace(".","",$string);
 return $string;
}

//setting the URL for the current DIR
if(isset($_GET['pathfinder'])){
	$pathfinder = cleanURL($_GET['pathfinder'])."/";
}else{
	$pathfinder = "";
}


$path_def		= 'explore/'.$pathfinder;
$globalMode       = false;
$dataDelay 	= 200;
$file_id	= 1;

if ($handle = opendir($path_def)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != "index.php" && $entry != "assets") {

      		//its a dir?
      		if(is_dir($path_def.$entry)){

      			//its a website?
      			if( (file_exists($path_def.$entry."/index.html") ) || (file_exists($path_def.$entry."/index.htm") ) || (file_exists($path_def.$entry."/index.php") )  ){
      				$desc = "Website";
					if (file_exists($path_def.$entry."/thumb.jpg")) { $showthumb = $path_def.$entry."/thumb.jpg"; } else { $showthumb = "assets/images/folder-thumb.jpg"; }
        				echo'

        				<!-- class="col-md-4 col-sm-6" add this class if not using salvattore -->
        				<div data-animate="bounceInUp" data-delay="'. $dataDelay .'">
        					<a href="fullpreview-'. base64_encode($path_def.$entry) .'" class="ghost-link anlinkate">
        					<figure class="folder">

        						<!-- Caption Hover -->
                				<div class="folder-hover">
                        			<div class="folder-hover-content">
                            			<i class="fa fa-arrows-alt fa-3x"></i>
                         			</div>
                     			</div>
                				<!-- Caption Hover -->

        						<img class="item-img" src="'. $showthumb .'" alt="' . $entry . '">
								<figcaption>
                        			<h4>'. $entry.'</h4>
                        			 <p>'. $desc .'</p>
								</figcaption>
							</figure>
							</a>
						</div>
        				';
        		}

      			//final chance, folder or nothing.
      			else {

      				$desc = "Folder";
      				//check the existing image
					if (file_exists($path_def.$entry."/folder-thumb.jpg")) {
						$showthumb = $path_def.$entry."/folder-thumb.jpg";
					} else if (file_exists($path_def.$entry."/folder-thumb.png")){
						$showthumb = $path_def.$entry."/folder-thumb.png";
					} else {
						$showthumb = "assets/images/folder-thumb.jpg";
					}
        				echo'

        				<div data-animate="bounceInRight" data-delay="'. $dataDelay .'">
        					<a href="'. $path_def.$entry .'" class="ghost-link anlinkate">
        					<figure class="folder">

        						<!-- Caption Hover -->
                				<div class="folder-hover">
                        			<div class="folder-hover-content">
                            			<i class="fa fa-folder-open-o fa-3x" aria-hidden="true"></i>
                         			</div>
                     			</div>
                				<!-- Caption Hover -->

        						<img class="item-img" src="'. $showthumb .'" alt="' . $entry . '">
								<figcaption>
                        			<h4>'. $entry .'</h4>
                        			 <p>'. $desc .'</p>
								</figcaption>
							</figure>
							</a>
						</div>
        				';
        		}
      		}

      		//its a file?
      		if(is_file($path_def.$entry)){

      			$file_parts = pathinfo($entry);

      			if( ($file_parts['extension'] == "jpg") || ($file_parts['extension'] == "jpeg") || ($file_parts['extension'] == "png") ) {

	        		$showthumb = $path_def.$entry;

	        		echo '

	        			<div data-animate="bounceInLeft" data-delay="'. $dataDelay .'">

	            			<a href="" class="ghost-link" data-toggle="modal" data-target=".fileid-'. $file_id .'">
	                			<figure class="folder">

	                			<!-- Caption Hover -->
	                        		<div class="folder-hover">
	                                	<div class="folder-hover-content">
	                                    	<i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>
	                                 	</div>
	                             	</div>
	                        	<!-- Caption Hover -->

	                				<img class="item-img" src="'. $showthumb .'" alt="' . $entry . '">
							        <figcaption>
	                                	<h4>'. $file_parts['filename']  .'</h4>
	                                	<p> Image </p>
							        </figcaption>
						        </figure>
						    </a>

                        <!-- Modal Photo -------------------------------------------------------------- -->

						<div class="modal fade image-modal fileid-'. $file_id .'" tabindex="-1" role="dialog">
						  <div class="modal-dialog" data-animate="fadeInUp">
						    <div class="modal-content dark">

								<button type="button" class="close flying-btn" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>

						    	<img src="'. $showthumb .'" alt="' . $file_parts['filename']  . '">

						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->

						<!-- Modal Photo -------------------------------------------------------------- -->

						</div>

	        		';
	        	}

      			else{

	        		$showthumb = "assets/images/file-thumb.jpg";

	        		echo '

	        			<div data-animate="bounceInDown" data-delay="'. $dataDelay .'">
	        			<a href="'. $path_def.$entry .'" class="ghost-link anlinkate">
	        			<figure class="folder">

	        			<!-- Caption Hover -->
	                		<div class="folder-hover">
	                        	<div class="folder-hover-content">
	                            	<i class="fa fa-file-text-o fa-3x"></i>
	                         	</div>
	                     	</div>
	                	<!-- Caption Hover -->

	        				<img class="item-img" src="'. $showthumb .'" alt="' . $entry . '">
							<figcaption>
	                        	<h4>'. $file_parts['filename']  .'</h4>
	                        	<p>.'. $file_parts['extension'] .' File</p>
							</figcaption>
						</figure>
						</a>
						</div>

	        		';
        		}
        	}

        }

        $dataDelay +=100;
        $file_id++;

        if ($dataDelay > 800){
        	$dataDelay = 150;
        }

    }
    closedir($handle);
}
?>
