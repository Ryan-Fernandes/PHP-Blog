            <!--Side bar-->
            <div class="col-md-4">
                
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <!--Login-->
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="POST">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <button name="login" class="btn btn-primary" type="submit">
                            Login
                            </button>
                        </div>
                        <div class="from-group">
                            <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
               <!--Login end-->
                <?php

                        $query="select * from categories";
                        $select_all_categories_query=mysqli_query($conn,$query); 
                ?>
                
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12"><!--this 12 can be replaced by php code for dividing the cols related 
                           to the number of categories available-->
                            <ul class="list-unstyled">
                               <?php
                                    while($row=mysqli_fetch_assoc($select_all_categories_query)){
                                    $cat_title = $row['cat_title'];
                                    $cat_id=$row['cat_id'];
                                    echo "<li>
                                            <a href='categories.php?c_id=$cat_id'>$cat_title</a>
                                        </li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
            
                
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>