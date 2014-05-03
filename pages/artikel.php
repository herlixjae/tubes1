<!-- middle -->

<?php
mysql_query("Update post_article SET hit=hit + 1 Where post_id='".$_GET['post_id']."'");
$q=mysql_query("SELECT post_article.post_id,post_article.id_cat, post_article.title, post_article.featurephoto, post_article.post_entry, post_article.create_date, post_article.hit, post_article.create_by, COUNT(komentar.id_komentar) as komen, post_category.nm_cat
FROM (post_article LEFT JOIN komentar ON post_article.post_id = komentar.post_id) LEFT JOIN post_category ON post_article.id_cat = post_category.id_cat Where post_article.post_id='".$_GET['post_id']."' GROUP BY post_article.post_id ORDER BY `create_date` DESC") or die(mysql_error());
$qr=mysql_fetch_array($q);

?>
<div class="middle sidebarRight">
<div class="container_12">

	<div class="back_title">
    	<div class="back_inner">
		<a href="?category=<?php echo $qr['id_cat']; ?>"><span>Berita <?php echo $qr['nm_cat']; ?> lainnya</span></a>
        </div>
    </div> 	 
    
    <div class="divider_space_thin"></div>
    
    <!-- content -->
    <div class="grid_12 content">
    	
		<div class="post-detail">
            
            <div class="page-title">
            <div class="meta-date"><?php echo timeAgo($qr['create_date']); ?></div>
            <h1><?php echo $qr['title']; ?></h1>
            </div>
            
			<div class="entry">
			
			  <p><?php echo $qr['post_entry']; ?></p>
              

                <div class="clear"></div>  				
          	</div>
			
           
            
            <!-- post comments -->
                        <div class="comment-list" id="comments">
                           
                        	<h2><?php echo $qr['komen']; ?> Readers Commented</h2>
                            
                            <ol>
                            <?php
							$c=mysql_query("SELECT komentar.id_komentar, userlogin.public_name, komentar.komentar, komentar.c_date, userlogin.avatar
FROM (komentar LEFT JOIN post_article ON komentar.post_id = post_article.post_id) LEFT JOIN userlogin ON komentar.id_user = userlogin.username where komentar.post_id='".$_GET['post_id']."'");
							
							$rc=mysql_num_rows($c);
							if($rc > 0) 
							{
								while($cr=mysql_fetch_array($c))
								{
							?>
                            
								<li class="comment">
                                
                                    <div class="comment-body">
                                    <div class="comment-avatar">
                                    	<div class="avatar">
                                        <?php
										
										
										if($cr['avatar']=="")
										{
											$avaview="images/ava-default.jpg";
										}elseif($cr['avatar']!=""){
											$avaview=$cr['avatar'];
										}
										?>
                                        <img src="<?php echo $avaview; ?>" width="90" height="90" alt="" />
                                        </div>
                                        <a href="#" class="link-author"><?php echo $cr['public_name']; ?></a>
                                    </div>    
                                    <div class="comment-text">
                                    	<div class="comment-author"> <span class="comment-date"><?php echo timeAgo($cr['c_date']); ?></span></div>
                                        <div class="comment-entry">
                                        <?php echo $cr['komentar']; ?>
                                       
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    </div>
                                                                     
                                </li>
                            <?php } } ?>                                
                                
                            </ol>
                        </div>
				<!--/ post comments -->
                        
                <!-- add comment -->
                <?php
				if(isset($_SESSION['hash']))
				{
				?>
                        <div class="box2 add-comment" id="addcomments">
                            <h3>Leave a Reply</h3>
                            
                            <div class="box2_content comment-form">
                            <form action="" method="post">
                                
                              
                                
                                 <div class="row">
                                    <label><strong>Comment</strong></label>
                                    <textarea cols="30" rows="10" name="message" class="textarea textarea_middle required"></textarea>
                                </div>
                                
                                    <input type="submit" name="Submit" value="Submit" class="btn-submit" />
                            </form>
                            </div>
                        </div>
                <!--/add comment --> 
            		<?php 
					}else{
					?>
                    Silahkan <a href="panel.php?direct=<?php echo $_SERVER['REQUEST_URI']; ?>">Login</a> dahulu atau <a href="panel.php#toregister">Daftar</a> sebelum memberikan komentar
                    <?php
					}
					
					 ?>
                
        </div>
        
    </div>
    <!--/ content -->

  
    <div class="clear"></div>
    
    <div class="divider_space_thin"></div>

  <?php
  date_default_timezone_set('Asia/Jakarta');
	$skrg=date("Y-m-d h:i:s");
  if(isset($_POST['Submit']))
  {
	  $j=mysql_query("INSERT INTO `portalboladb`.`komentar` (
`id_user` ,
`post_id` ,
`komentar` ,
`c_date`
)
VALUES ('".$_SESSION['user']."','".$_GET['post_id']."','".$_POST['message']."','".$skrg."')");
	_direct("?post_id=".$_GET['post_id']."");
  }
  ?>