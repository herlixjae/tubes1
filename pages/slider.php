<!-- slider -->
<p>&nbsp;</p>

<div class="header_slider">
    
    <ul id="slider1" class="bxSlider">
    <?php

$q=mysql_query("SELECT post_article.post_id, post_article.title, post_article.featurephoto, post_article.post_entry, post_article.create_date, post_article.hit, post_article.create_by, COUNT(komentar.id_komentar) as komen, post_category.nm_cat
FROM (post_article LEFT JOIN komentar ON post_article.post_id = komentar.post_id) LEFT JOIN post_category ON post_article.id_cat = post_category.id_cat Where post_article.status='1' GROUP BY post_article.post_id ORDER BY `create_date` DESC LIMIT 0,5") or die(mysql_error());
while($qr=mysql_fetch_array($q))
{
?>

      <li style="background: url('uploads/images/<?php echo $qr['featurephoto']; ?>') no-repeat scroll center 0 transparent;background-size: 100% 100%;">
       
        <div class="fakeimg"></div>
        <div class="slide-text-wrapper">
            <div class="slide-text-content">
            <div class="meta-date"><span class="ico_cat"><em><?php echo $qr['nm_cat']; ?></em></span> <?php echo timeAgo($qr['create_date']); ?></div>
            <a href="?post_id=<?php echo $qr['post_id']; ?>" class="slide-title"><strong><?php echo $qr['title']; ?></strong></a>
            <div class="slide-button"><a href="?post_id=<?php echo $qr['post_id']; ?>" class="button_link"><span>Read</span></a> </div>
            </div>
        </div>
      </li>
<?php
}
?>
     

    </ul>	
</div>
<!--/ slider -->

<div class="container_title">
    <div class="header_title">
    	<div class="header_tab_title">
            <a href="#prev" class="slider-prev" id="go-prev">Prev</a><a href="#next" class="slider-next" id="go-next">Next</a>
           
        </div>
    </div> 
    </div>