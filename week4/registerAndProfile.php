<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Website</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="includes/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/css/styles.css">
</head>
<body class="container">
<header>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <nav class="navbar navbar-inverse" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!--When user signs in populate this area with extra link to user profile-->
                        <li><a href="#" data-toggle="modal" data-target="#register">Sign Up</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#login" class="loginLogoutButton">Log In</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            <div class="jumbotron">
                <div class="container">
                    <h1>Education Drive</h1>
                    <p>Sign up to support marginalized impoverished populations with the gift of education.</p>
                    <p>
                        <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register">Sign Up</a>
                    </p>
                </div>
            </div><!--jumbotron-->
        </div><!--col-->
    </div><!--row-->
</header>
<section>
    <div class="row">
        <main>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h1>The Gift of Education</h1>
                <p>This week's project is about connecting to different API accounts and I picked user a registration and login program as
                my prof of concept. I decided not to use passwords in this program as that adds an additional
                    level of complexity to the program time doesn't allow. You can use the navigation to sig-up for an account, login for
                    grabbing your profile information used on sign-up, and can view your profile by hitting the user icon in th navigation.
                    There is some validation used in the program, but it isn't perfect by any means.</p>
                <img src="includes/images/homeMain_1.jpg" class="img-responsive pull-right" alt="Image">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut blanditiis culpa dolorem
                        ducimus eius, illo laborum odio perspiciatis provident quam quia quis recusandae repellendus sed
                        sequi totam? Culpa, exercitationem!</p>

            </div>
        </main>
        <aside>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus deserunt ducimus inventore, ipsa
                        numquam soluta temporibus. Asperiores facere labore laboriosam. Consequuntur culpa deleniti et fuga
                        hic modi nihil provident voluptate?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci distinctio eius hic in incidunt
                        ipsa ipsam iste, iure iusto magnam maxime minus modi nobis possimus quis quod ratione sed,
                        suscipit.</p>
                <div class="btn-group">
                    <button type="button" class="btn btn-default">Donate</button>
                </div>
            </div><!--end col-->
        </aside>
    </div><!--end row-->
</section>

<!--Modal Areas-->
<section>
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="Register">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Register</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="includes/actions/createUser.php" id="registerForm">
                        <div class="form-group">
                            <label for="username" class="label">Username:</label>
                            <input type="text" id="username" name="username" class="form-control">

                            <label for="firstName" class="label">First Name:</label>
                            <input type="text" id="firstName" name="firstName" class="form-control">

                            <label for="lastName" class="label">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" class="form-control">

                            <label for="company" class="label">Company:</label>
                            <input type="text" id="company" name="company" class="form-control">

                            <label for="age" class="label">Age:</label>
                            <input type="number" id="age" name="age" class="form-control" min="0" max="120">

                            <label for="email" class="label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control">

                            <label for="phone" class="label">Phone:</label>
                            <input type="tel" id="phone" name="phone" class="form-control">
                        </div>
                    </form>
                </div><!--modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="button" value="Sign Up" class="btn btn-primary modalSignUpButton">
                </div>
            </div>
        </div>
    </div><!-- end register modal-->
</section>
<section>
    <div class="modal fade" id="login">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">Login by Username</h4>
    			</div>
    			<div class="modal-body">
    				<label class="label">Username:</label>
                    <input type="text" id="profileUsername" class="form-control">
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				<button type="button" class="btn btn-primary loginButton">Log In</button>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>

<script src="includes/lib/jquery/jquery.min.js"></script>
<script src="includes/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="includes/js/showResults.js"></script>
</body>
</html>