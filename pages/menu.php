 <!-- topmenu -->
        <div class="topmenu">
                    <ul class="dropdown">
                    <?php
					$q=mysql_query("Select * from post_category");
					while($r=mysql_fetch_array($q))
					{
					?>
                    <li><a href="?category=<?php echo $r['id_cat']; ?>"><span><?php echo $r['nm_cat']; ?></span></a></li>
                    <?php
					}
					?>                       
                        </li>
                    </ul>
                </div>
        	<!--/ topmenu -->